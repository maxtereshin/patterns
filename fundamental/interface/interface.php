<?php

include "../event_channel/event_channel.php";
class EventChannelJob
{
    public function run() {
        $newsChannel = new EventChannel();

// Создаем издателей
        $newYorkTimes = new Publisher('newyorktimes-news', $newsChannel);
        $rbk = new Publisher('rbk-news', $newsChannel);
        $guardian = new Publisher('guardian-news', $newsChannel);

        $ivan = new Subscriber('Иван');
        $maxim = new Subscriber('Максим');

// Подпишем наших подписчиков на события издателей
        $newsChannel->subscribe('newyorktimes-news', $ivan);
        $newsChannel->subscribe('newyorktimes-news', $maxim);
        $newsChannel->subscribe('rbk-news', $ivan);

        echo "<br>";

// Публикуем события
        $newYorkTimes->publish('Новость от New York Times');
        $rbk->publish('Новость от РБК');
        $newYorkTimes->publish('Еще одна новость от New York Times');
        $guardian->publish('Новость от Guardian');
    }
}