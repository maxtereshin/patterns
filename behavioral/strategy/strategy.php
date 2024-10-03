<?php

/**
 * Это роутер и контроллер нашего приложения. Получив запрос, этот класс решает,
 * какое поведение должно выполняться. Когда приложение получает требование об
 * оплате, класс OrderController также решает, какой способ оплаты следует
 * использовать для его обработки. Таким образом, этот класс действует как
 * Контекст и в то же время как Клиент.
 */
class OrderController
{
    /**
     * Обрабатываем запросы POST.
     *
     * @param  string  $url
     * @param  array  $data
     */
    public function post(string $url, array $data)
    {
        echo "Controller: POST request to $url with " . json_encode($data) . "<br>";
        $path = parse_url($url, PHP_URL_PATH);

        if (preg_match('#^/orders?$#', $path, $matches)) {
            $this->postNewOrder($data);
        } else {
            echo "Controller: 404 page<br>";
        }
    }

    /**
     * Обрабатываем запросы GET.
     *
     * @param  string  $url
     * @throws Exception
     */
    public function get(string $url): void
    {
        echo "Controller: GET request to $url<br>";

        $path = parse_url($url, PHP_URL_PATH);
        $query = parse_url($url, PHP_URL_QUERY);

        $data = [];
        if($query) {
            parse_str($query, $data);
        }

        if (preg_match('#^/orders?$#', $path, $matches)) {
            $this->getAllOrders();
        } elseif (preg_match('#^/order/([0-9]+?)/payment/([a-z]+?)(/return)?$#', $path, $matches)) {
            $order = Order::get($matches[1]);

            // Способ оплаты (стратегия) выбирается в соответствии со значением,
            // переданным в запросе.
            $paymentMethod = $this->getPaymentMethod($matches[2]);
            $this->getPayment($paymentMethod, $order);
        } else {
            echo "Controller: 404 page<br>";
        }
    }

    public function getPaymentMethod(string $id): PaymentMethod
    {
        return match ($id) {
            "cc" => new CreditCardPayment(),
            "paypal" => new PayPalPayment(),
            default => throw new Exception("Unknown Payment Method"),
        };
    }
    /**
     * POST /order {data}
     */
    public function postNewOrder(array $data): void
    {
        $order = new Order($data);
        echo "Controller: Created the order #{$order->id}.<br>";
    }

    /**
     * GET /orders
     */
    public function getAllOrders(): void
    {
        echo "Controller: Here's all orders:<br>";
        foreach (Order::get() as $order) {
            echo json_encode($order, JSON_PRETTY_PRINT) . "<br>";
        }
    }

    /**
     * GET /order/123/payment/XX
     */
    public function getPayment(PaymentMethod $method, Order $order): void
    {
        // Фактическая работа делегируется объекту метода оплаты.
        $form = $method->getPaymentForm($order);
        echo "Controller: here's the payment form:<br>";
        echo $form . "\n";
    }
}

/**
 * Упрощенное представление класса Заказа.
 */
class Order
{
    private static array $orders = [];
    /**
     * @param  int|null  $orderId
     * @return mixed
     */
    public static function get(int $orderId = null): mixed
    {
        if ($orderId === null) {
            return static::$orders;
        } else {
            return static::$orders[$orderId];
        }
    }

    /**
     * Конструктор Заказа присваивает значения полям заказа. Чтобы всё было
     * просто, нет никакой проверки.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes)
    {
        $this->id = count(static::$orders) + 1;
        $this->status = "new";
        foreach ($attributes as $key => $value) {
            $this->{$key} = $value;
        }
        static::$orders[$this->id] = $this;
    }

    /**
     * Метод позвонить при оплате заказа.
     */
    public function complete(): void
    {
        $this->status = "completed";
        echo "Order: #{$this->id} is now {$this->status}. <br>";
    }
}


/**
 * Интерфейс Стратегии описывает, как клиент может использовать различные
 * Конкретные Стратегии.
 */
interface PaymentMethod
{
    public function getPaymentForm(Order $order): string;
}

/**
 * Эта Конкретная Стратегия предоставляет форму оплаты и проверяет результаты
 * платежей кредитными картам.
 */
class CreditCardPayment implements PaymentMethod
{
    static private string $store_secret_key = "swordfish";

    public function getPaymentForm(Order $order): string
    {
        $returnURL = "https://our-website.com/" .
            "order/{$order->id}/payment/cc/return";

        return <<<FORM
            <form action="https://my-credit-card-processor.com/charge" method="POST">
                <input type="hidden" id="email" value="{$order->email}"> 
                <input type="hidden" id="total" value="{$order->total}"> 
                <input type="hidden" id="returnURL" value="$returnURL">
               Name: <input type="text" id="cardholder-name"> <br>
               Card: <input type="text" id="credit-card"> <br>
               Expiration <input type="text" id="expiration-date"> <br>
               CCV: <input type="text" id="ccv-number"> <br>
                <input type="submit" value="Pay"> <br>
            </form>
            FORM;
    }
}

/**
 * Эта Конкретная Стратегия предоставляет форму оплаты и проверяет результаты
 * платежей PayPal.
 */
class PayPalPayment implements PaymentMethod
{
    public function getPaymentForm(Order $order): string
    {
        $returnURL = "https://our-website.com/" .
            "order/{$order->id}/payment/paypal/return";

        return <<<FORM
            <form action="https://paypal.com/payment" method="POST">
                <input type="hidden" id="email" value="{$order->email}">
                <input type="hidden" id="total" value="{$order->total}">
                <input type="hidden" id="returnURL" value="$returnURL">
                <input type="submit" value="Pay on PayPal">
            </form>
            FORM;
    }
}