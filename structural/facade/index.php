<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Паттерны проектирования</title>
</head>
<body style="text-align: left; width: 1100px; margin-left: 23%; font-size: 26px">
<div style="background-color: #e4eff9; padding-left: 30px; padding-bottom: 15px;">
    <h1>Фасад  (англ. Facade)<br></h1>

    Структурный паттерн проектирования,  который предоставляет простой интерфейс к сложной системе классов, библиотеке или фреймворку.<br>
    Фасад — это простой интерфейс для работы со сложной подсистемой, содержащей множество классов. Фасад может иметь урезанный интерфейс,
    не имеющий 100% функциональности, которой можно достичь, используя сложную подсистему напрямую. Но он предоставляет именно те фичи, которые нужны клиенту, и скрывает все остальные.

    Фасад полезен, если вы используете какую-то сложную библиотеку со множеством подвижных частей, но вам нужна только часть её возможностей.
</div>


<div style="background-color: black; color: white; margin-top: 50px; padding-left: 10px; padding-bottom: 15px;">
<h3>Пример</h3>
<?php
include 'facade.php';

$facade = new YouTubeDownloader("APIKEY-XXXXXXXXX");
$facade->downloadVideo("https://www.youtube.com/watch?v=QH2-TGUlwu4");

?>
</div>
</body>
</html>
