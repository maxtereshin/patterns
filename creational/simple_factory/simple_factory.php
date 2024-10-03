<?php

interface MessengerInterface
{
    function setSender($value);
    function setRecipient($value);
    function setMessage($value);
    function send();
}

abstract class AbstractMessenger implements MessengerInterface
{
    protected string $sender;
    protected string $recipient;
    protected string $message;

    /**
     * @param $value
     * @return MessengerInterface
     */
    public function setSender($value): MessengerInterface
    {
        $this->sender = $value;
        return $this;
    }

    /**
     * @param $value
     * @return MessengerInterface
     */
    public function setRecipient($value): MessengerInterface
    {
        $this->recipient = $value;
        return $this;
    }

    /**
     * @param $value
     * @return MessengerInterface
     */
    public function setMessage($value): MessengerInterface
    {
        $this->message = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function send(): bool
    {
        echo "Sent from $this->sender to $this->recipient with message $this->message<br>";
        return true;
    }

}

class EmailMessenger extends AbstractMessenger
{
    /**
     * @return bool
     */
    public function send(): bool
    {
        echo "Sent by " . __METHOD__ . "<br>";
        return parent::send();
    }

}

class SmsMessenger extends AbstractMessenger
{
    /**
     * @return bool
     */
    public function send(): bool
    {
        echo "Sent by " . __METHOD__ . "<br>";
        return parent::send();
    }

}

class MessengerFactory
{
    public static function factory($type)
    {
        return match ($type) {
            'email' => new EmailMessenger(),
            'sms' => new SmsMessenger(),
            default => null,
        };
    }
}