<?php

/**
 * Целевой интерфейс предоставляет интерфейс, которому следуют классы вашего
 * приложения.
 */
interface Notification
{
    public function send(string $title, string $message);
}

/**
 * Вот пример существующего класса, который следует за целевым интерфейсом.
 *
 * Дело в том, что у большинства приложений нет чётко определённого интерфейса.
 * В этом случае лучше было бы расширить Адаптер за счёт существующего класса
 * приложения. Если это неудобно (например, SlackNotification не похож на
 * подкласс EmailNotification), тогда первым шагом должно быть извлечение
 * интерфейса.
 */
class EmailNotification implements Notification
{
    private string $adminEmail;

    public function __construct(string $adminEmail)
    {
        $this->adminEmail = $adminEmail;
    }

    public function send(string $title, string $message): void
    {
        echo "Sent email with title '$title' to '{$this->adminEmail}' that says '$message'.";
    }
}

/**
 * Адаптируемый класс – некий полезный класс, несовместимый с целевым
 * интерфейсом. Нельзя просто войти и изменить код класса так, чтобы следовать
 * целевому интерфейсу, так как код может предоставляться сторонней библиотекой.
 */
class SlackApi
{
    private string $login;
    private string $apiKey;

    public function __construct(string $login, string $apiKey)
    {
        $this->login = $login;
        $this->apiKey = $apiKey;
    }

    public function logIn(): void
    {
        // Send authentication request to Slack web service.
        echo "Logged in to a slack account '{$this->login}' and API key '{$this->apiKey}'.<br>";
    }

    public function sendMessage(string $chatId, string $message): void
    {
        // Send message post request to Slack web service.
        echo "Posted following message into the '$chatId' chat: '$message'.<br>";
    }
}

/**
 * Адаптер – класс, который связывает Целевой интерфейс и Адаптируемый класс.
 * Это позволяет приложению использовать Slack API для отправки уведомлений.
 */
class SlackNotification implements Notification
{
    private SlackApi $slack;
    private string $chatId;

    public function __construct(SlackApi $slack, string $chatId)
    {
        $this->slack = $slack;
        $this->chatId = $chatId;
    }

    /**
     * Адаптер способен адаптировать интерфейсы и преобразовывать входные данные
     * в формат, необходимый Адаптируемому классу.
     */
    public function send(string $title, string $message): void
    {
        $slackMessage = "#" . $title . "# " . strip_tags($message);
        $this->slack->logIn();
        $this->slack->sendMessage($this->chatId, $slackMessage);
    }
}
