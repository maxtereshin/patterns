<?php

/**
 * Создатель объявляет фабричный метод, который может быть использован вместо
 * прямых вызовов конструктора продуктов, например:
 * Это позволяет подклассам SocialNetworkPoster изменять тип создаваемого
 * продукта.
 */
abstract class SocialNetworkPoster
{
    /**
     * Фактический фабричный метод. Обратите внимание, что он возвращает
     * абстрактный коннектор. Это позволяет подклассам возвращать любые
     * конкретные коннекторы без нарушения контракта суперкласса.
     */
    abstract public function getSocialNetwork(): SocialNetworkConnector;

    /**
     * Когда фабричный метод используется внутри бизнес-логики Создателя,
     * подклассы могут изменять логику косвенно, возвращая из фабричного метода
     * различные типы коннекторов.
     */
    public function post($content): void
    {
        // Вызываем фабричный метод для создания объекта Продукта...
        $network = $this->getSocialNetwork();
        // ...а затем используем его по своему усмотрению.
        $network->logIn();
        $network->createPost($content);
        $network->logout();
    }
}

/**
 * Этот Конкретный Создатель поддерживает Facebook. Помните, что этот класс
 * также наследует метод post от родительского класса. Конкретные Создатели —
 * это классы, которые фактически использует Клиент.
 */
class FacebookPoster extends SocialNetworkPoster
{
    private $login, $password;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function getSocialNetwork(): SocialNetworkConnector
    {
        return new FacebookConnector($this->login, $this->password);
    }
}

/**
 * Этот Конкретный Создатель поддерживает LinkedIn.
 */
class LinkedInPoster extends SocialNetworkPoster
{
    private $email, $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function getSocialNetwork(): SocialNetworkConnector
    {
        return new LinkedInConnector($this->email, $this->password);
    }
}

interface SocialNetworkConnector
{
    public function logIn(): void;

    public function logOut(): void;

    public function createPost($content): void;
}

/**
 * Этот Конкретный Продукт реализует API Facebook.
 */
class FacebookConnector implements SocialNetworkConnector
{
    private $login, $password;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function logIn(): void
    {
        echo "Log in user $this->login with password $this->password in Facebook<br>";
    }

    public function logOut(): void
    {
        echo "Log out user $this->login from Facebook<br>";
    }

    public function createPost($content): void
    {
        echo "Create a post in Facebook: $content<br>";
    }
}

/**
 * А этот Конкретный Продукт реализует API LinkedIn.
 */
class LinkedInConnector implements SocialNetworkConnector
{
    private $email, $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function logIn(): void
    {
        echo "Log in user $this->email with password $this->password in LinkedIn<br>";
    }

    public function logOut(): void
    {
        echo "Log out user $this->email\n from LinkedIn<br>";
    }

    public function createPost($content): void
    {
        echo "Create a post in LinkedIn: $content.<br>";
    }
}
