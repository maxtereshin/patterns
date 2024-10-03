<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Паттерны проектирования</title>
</head>
<body style="text-align: left; width: 1100px; margin-left: 23%; font-size: 26px">
<div style="background-color: #e4eff9; padding-left: 30px; padding-bottom: 15px;">
    <h1>Итератор (англ. Iterator)<br></h1>

    Это поведенческий паттерн проектирования, позволяющий последовательно обходить сложную коллекцию, без раскрытия деталей её реализации.<br><br>

    Паттерн можно часто встретить в PHP-коде, особенно в программах, работающих с разными типами коллекций, и где требуется обход разных сущностей.<br><br>

    PHP имеет встроенный интерфейс для поддержки итераторов (Iterator), на основании которого можно строить свои Итераторы, совместимые с остальным PHP-кодом.
</div>


<div style="background-color: black; color: white; margin-top: 50px; padding-left: 10px; padding-bottom: 15px;">
<h3>Пример</h3>
<?php
include 'iterator.php';

/**
 * Клиентский код может знать или не знать о Конкретном Итераторе или классах
 * Коллекций, в зависимости от уровня косвенности, который вы хотите сохранить в
 * своей программе.
 */
$collection = new WordsCollection();
$collection->addItem("First");
$collection->addItem("Second");
$collection->addItem("Third");

echo "Straight traversal:<br>";
foreach ($collection->getIterator() as $item) {
    echo $item . "<br>";
}

echo "<br><br>";
echo "Reverse traversal:<br>";
foreach ($collection->getReverseIterator() as $item) {
    echo $item . "<br>";
}


?>
</div>
</body>
</html>
