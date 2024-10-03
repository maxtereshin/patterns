<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
</head>
<body style="text-align: left; width: 1100px; margin-left: 23%; font-size: 26px">
<div style="background-color: #e4eff9; padding-left: 30px; padding-bottom: 15px;">
    <h1>Интерфейс (англ. interface)<br></h1>

    Это класс, который обеспечивает программисту простой или более программно-специфический способ доступа к другим классам.<br><br>

    Интерфейс может содержать набор объектов и обеспечивать простую, высокоуровневую функциональность для программиста (например, Шаблон Фасад);
    он может обеспечивать более чистый или более специфический способ использования сложных классов («класс-обёртка»);
    он может использоваться в качестве «клея» между двумя различными API (Шаблон Адаптер); и для многих других целей.
</div>


<div style="background-color: black; color: white; margin-top: 50px; padding-left: 10px; padding-bottom: 15px;">
<h3>Пример</h3>
<?php
include 'interface.php';

$eventChannel = new EventChannelJob();
$eventChannel->run();

?>
</div>
</body>
</html>
