<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Паттерны проектирования</title>
</head>
<body style="text-align: left; width: 1100px; margin-left: 23%; font-size: 26px">
<div style="background-color: #e4eff9; padding-left: 30px; padding-bottom: 15px;">
    <h1>Наблюдатель (англ. Observer)<br></h1>

    Наблюдатель это поведенческий паттерн, который позволяет объектам оповещать другие объекты об изменениях своего состояния.<br><br>

    Наблюдатель можно часто встретить в PHP коде, особенно там, где применяется событийная модель отношений между компонентами.
    Наблюдатель позволяет отдельным компонентам реагировать на события, происходящие в других компонентах.<br><br>

    PHP имеет несколько встроенных интерфейсов (SplSubject, SplObserver), на которых можно строить свои реализации Наблюдателя, совместимые с остальным PHP-кодом.
</div>


<div style="background-color: black; color: white; margin-top: 50px; padding-left: 10px; padding-bottom: 15px;">
<h3>Пример</h3>
<?php
include 'observer.php';

$observer = new UserObserver();

$user = new User('Иван Иванов', 'test@localhost');
$user->attach($observer);

$user->changeEmail('foo@bar.com');
$user->changeName('Foo Bar');

$user = new User('Петр Петров', 'petr@localhost');
$user->attach($observer);
$user->changeName('123 Bar');

?>
</div>
</body>
</html>
