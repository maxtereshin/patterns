<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
</head>
<body style="text-align: left; width: 1100px; margin-left: 23%; font-size: 26px">
<div style="background-color: #e4eff9; padding-left: 30px; padding-bottom: 15px;">
    <h1>Канал событий (англ. event channel)<br></h1>

    Фундаментальный шаблон проектирования, используется для создания канала связи и коммуникации через него посредством событий.
    Этот канал обеспечивает возможность разным издателям публиковать события и подписчикам, подписываясь на них, получать уведомления.

    Этот шаблон - является расширением шаблона "Издатель-подписчик (Publish/Subscribe)" путем добавления функций, которые присущи распределенной среде.
    Так, канал является централизованным и подписчик может получать опубликованные события от более, чем одного объекта, даже если он зарегистрирован только на одном канале.

    Шаблон "Канал событий" использует сильно типизированные события; это означает, что подписчик может ожидать поступления определенных типов данных события,
    если регистрируется для определенного события.
    Он также позволяет подписчику отправлять события, а не только получать события, посланные ему.
</div>


<div style="background-color: black; color: white; margin-top: 50px; padding-left: 10px; padding-bottom: 15px;">
<h3>Пример</h3>
<?php
include 'event_channel.php';

$newsChannel = new EventChannel();

// Создаем издателей
$newYorkTimes = new Publisher('newyorktimes-news', $newsChannel);
$rbk = new Publisher('rbk-news', $newsChannel);
$guardian = new Publisher('guardian-news', $newsChannel);

// Создаем подписчиков
$ivan = new Subscriber('Иван');
$maxim = new Subscriber('Максим');
$petr = new Subscriber('Петр');

// Подпишем наших подписчиков на события издателей
$newsChannel->subscribe('newyorktimes-news', $ivan);
$newsChannel->subscribe('newyorktimes-news', $maxim);
$newsChannel->subscribe('guardian-news', $petr);
$newsChannel->subscribe('rbk-news', $ivan);
$newsChannel->subscribe('rbk-news', $petr);

echo "<br>";

// Публикуем события
$newYorkTimes->publish('Новость от New York Times');
$rbk->publish('Новость от РБК');
$newYorkTimes->publish('Еще одна новость от New York Times');
$guardian->publish('Новость от Guardian');

?>
</div>
</body>
</html>
