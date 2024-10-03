<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
</head>
<body style="text-align: left; width: 1100px; margin-left: 23%; font-size: 26px">
<div style="background-color: #e4eff9; padding-left: 30px; padding-bottom: 15px;">
    <h1>Делегирование (англ. delegation)<br></h1>

    Фундаментальный шаблон проектирования, в котором объект внешне выражает некоторое поведение,
    но в реальности передаёт ответственность за выполнение этого поведения связанному объекту. Шаблон делегирования является фундаментальной абстракцией, которая поддерживает композицию
</div>


<div style="background-color: black; color: white; margin-top: 50px; padding-left: 10px; padding-bottom: 15px;">
<h3>Пример</h3>
<?php
include 'delegation.php';

$appMessenger = new AppMessenger();

$appMessenger
    ->toEmail() // переключаемся на отправку писем
    ->setSender('support@support.com')
    ->setRecipient('info@support.com')
    ->setMessage('Hello')
    ->send();

echo '<br><br>';

$appMessenger
    ->toSms() // переключаемся на отправку SMS
    ->setSender('+7 934 534 53 45')
    ->setRecipient('+7 999 999 99 99')
    ->setMessage('Hello my friend!')
    ->send();

?>
</div>
</body>
</html>
