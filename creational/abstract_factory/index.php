<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Паттерны проектирования</title>
</head>
<body style="text-align: left; width: 1100px; margin-left: 23%; font-size: 26px">
<div style="background-color: #e4eff9; padding-left: 30px; padding-bottom: 15px;">
    <h1>Абстрактная фабрика (англ. Abstract factory)<br></h1>

    Порождающий шаблон проектирования, предоставляет интерфейс для создания семейств взаимосвязанных или взаимозависимых объектов,
    не специфицируя их конкретных классов. Шаблон реализуется созданием абстрактного класса Factory, который представляет собой интерфейс
    для создания компонентов системы (например, для оконного интерфейса он может создавать окна и кнопки). Затем пишутся классы, реализующие этот интерфейс.
</div>


<div style="background-color: black; color: white; margin-top: 50px; padding-left: 10px; padding-bottom: 15px;">
<h3>Пример</h3>
<?php
include 'abstract_factory.php';

$guiKit = (new GuiKitFactory())->getFactory('semanticui');

$button = $guiKit->buildButton()->draw();
echo $button . '<br>';
$checkbox = $guiKit->buildCheckBox()->draw();
echo $checkbox . '<br>';

$guiKit = (new GuiKitFactory())->getFactory('bootstrap');

$button = $guiKit->buildButton()->draw();
echo $button . '<br>';
$checkbox = $guiKit->buildCheckBox()->draw();
echo $checkbox . '<br>';

?>
</div>
</body>
</html>
