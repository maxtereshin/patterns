<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Паттерны проектирования</title>
</head>
<body style="text-align: left; width: 1100px; margin-left: 23%; font-size: 26px">
<div style="background-color: #e4eff9; padding-left: 30px; padding-bottom: 15px;">
    <h1>Простая фабрика (англ. simple factory)<br></h1>

    Порождающий шаблон проектирования, который определяет общий интерфейс для создания объектов в суперклассе, позволяя подклассам изменять тип создаваемых объектов.
</div>


<div style="background-color: black; color: white; margin-top: 50px; padding-left: 10px; padding-bottom: 15px;">
<h3>Пример</h3>
<?php
include 'simple_factory.php';

$messenger = MessengerFactory::factory('sms');

if ($messenger instanceof MessengerInterface) {
    $messenger
        ->setSender('support@support.com')
        ->setRecipient('info@support.com')
        ->setMessage('Hello')
        ->send();
}

//echo '<br><br>';

//$smsMessenger = MessengerFactory::factory('sms');
//
//if ($smsMessenger instanceof MessengerInterface) {
//    $smsMessenger
//        ->setSender('+7 934 534 53 45')
//        ->setRecipient('+7 999 999 99 99')
//        ->setMessage('Hello my friend!')
//        ->send();
//}

?>
</div>
</body>
</html>
