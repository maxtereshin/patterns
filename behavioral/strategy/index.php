<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Паттерны проектирования</title>
</head>
<body style="text-align: left; width: 1100px; margin-left: 23%; font-size: 26px">
<div style="background-color: #e4eff9; padding-left: 30px; padding-bottom: 15px;">
    <h1>Стратегия (англ. Strategy)<br></h1>

    Это поведенческий паттерн проектирования, который определяет семейство схожих алгоритмов
    и помещает каждый из них в собственный класс, после чего алгоритмы можно взаимозаменять прямо во время исполнения программы.<br><br>

    Стратегию часто используют в PHP-коде, особенно там, где нужно подменять алгоритм во время выполнения программы.
    Но у паттерна есть довольно сильный конкурент в лице анонимных функций, которые PHP уже довольно давно поддерживает.
</div>


<div style="background-color: black; color: white; margin-top: 50px; padding-left: 10px; padding-bottom: 15px;">
<h3>Пример</h3>
<?php
include 'strategy.php';

/**
 * Клиентский код.
 */

$controller = new OrderController();

echo "Client: Let's create some orders<br>";

$controller->post("/orders", [
    "email" => "me@example.com",
    "product" => "ABC Cat food (XL)",
    "total" => 9.95,
]);

$controller->post("/orders", [
    "email" => "me@example.com",
    "product" => "XYZ Cat litter (XXL)",
    "total" => 19.95,
]);

echo "<br>Client: List my orders, please<br>";

$controller->get("/orders");

echo "<br>Client: I'd like to pay for the second, show me the payment form<br>";

$controller->get("/order/2/payment/paypal");

echo "<br>Client: ...pushes the Pay button...<br>";

echo "<br>Client: I'd like to pay for the first, show me the payment form<br>";
$controller->get("/order/2/payment/cc");
echo "<br>Client: ...send Payment form...<br>";
?>
</div>
</body>
</html>
