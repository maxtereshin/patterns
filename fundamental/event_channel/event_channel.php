<?php

interface SubscriberInterface
{
    public function notify(string $data);
    public function getName();
}

interface PublisherInterface
{
    public function publish(string $data);
}

interface EventChannelInterface
{
    public function subscribe(string $topic, SubscriberInterface $subscriber): void;
    public function publish(string $topic, string $data): void;
}

class EventChannel implements EventChannelInterface
{
    /**
     * @var array
     */
    protected array $topics = []; // массив для хранения подписчиков по событиям

    /**
     * @param string $topic
     * @param SubscriberInterface $subscriber
     * @return void
     */
    public function subscribe(string $topic, SubscriberInterface $subscriber): void
    {
        $this->topics[$topic][] = $subscriber;

        echo "{$subscriber->getName()} подписался на [{$topic}] <br>";
    }
    /**
     * @param string $topic
     * @param string $data
     * @return void
     */
    public function publish(string $topic, string $data): void
    {
        if (empty($this->topics[$topic])) {
            return;
        }

        foreach ($this->topics[$topic] as $subscriber) {
            $subscriber->notify($data);
        }
    }

}

class Subscriber implements SubscriberInterface
{
    public function __construct(protected string $name)
    {
        //
    }
    public function notify($data)
    {
        echo "Подписчик {$this->getName()} уведомлен о новости [{$data}] <br>";
    }
    public function getName()
    {
        return $this->name;
    }

}

class Publisher implements PublisherInterface
{
    public function __construct(protected string $topic, protected EventChannelInterface $eventChannel)
    {
        //
    }
    public function publish(string $data)
    {
        $this->eventChannel->publish($this->topic, $data);
    }

}