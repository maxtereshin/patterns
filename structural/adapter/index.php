<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Паттерны проектирования</title>
</head>
<body style="text-align: left; width: 1100px; margin-left: 23%; font-size: 26px">
<div style="background-color: #e4eff9; padding-left: 30px; padding-bottom: 15px;">
    <h1>Адаптер (англ. Adapter)<br></h1>

    Структурный паттерн проектирования, который позволяет объектам с несовместимыми интерфейсами работать вместе.
    Паттерн позволяет использовать объекты с одной стороны и интерфейсами другой.
</div>


<div style="background-color: black; color: white; margin-top: 50px; padding-left: 10px; padding-bottom: 15px;">
<h3>Пример</h3>
<?php
include 'adapter.php';

/**
 * Клиентский код работает с классами, которые следуют Целевому интерфейсу.
 */
function clientCode(Notification $notification)
{
    echo $notification->send("Website is down!",
        "<strong style='color:red;font-size: 50px;'>Alert!</strong> " .
        "Our website is not responding. Call admins and bring it up!");
}

echo "Client code is designed correctly and works with email notifications:<br>";
$notification = new EmailNotification("developers@example.com");
clientCode($notification);
echo "<br><br>";


echo "The same client code can work with other classes via adapter:<br>";
$slackApi = new SlackApi("example.com", "******");
$notification = new SlackNotification($slackApi, "Developers");
clientCode($notification);

?>
</div>
</body>
</html>
