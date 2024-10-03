<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Паттерны проектирования</title>
</head>
<body style="text-align: left; width: 1100px; margin-left: 23%; font-size: 26px">
<div style="background-color: #e4eff9; padding-left: 30px; padding-bottom: 15px;">
    <h1>Мост (англ. Bridge)<br></h1>

    Структурный паттерн проектирования, который разделяет один или несколько классов на две отдельные иерархии — абстракцию и реализацию, позволяя изменять их независимо друг от друга.
    Паттерн Мост особенно полезен когда вам приходится поддерживать несколько типов баз данных или работать с разными поставщиками похожего API (например, cloud-сервисы, социальные сети и т. д
</div>


<div style="background-color: black; color: white; margin-top: 50px; padding-left: 10px; padding-bottom: 15px;">
<h3>Пример</h3>
<?php
//include 'without_bridge.php';
include 'with_bridge.php';

//$product = new Product();
//(new WidgetBigProduct())->run($product);
//(new WidgetMiddleProduct())->run($product);
//(new WidgetSmallProduct())->run($product);
//
//echo "<br><br>";
//
//$category = new Category();
//(new WidgetBigCategory())->run($category);
//(new WidgetMiddleCategory())->run($category);
//(new WidgetSmallCategory())->run($category);

$productRealization = new ProductWidgetRealization(new Product());
$categoryRealization = new CategoryWidgetRealization(new Category());
$clientRealisation = new ClientWidgetRealization(new Client());

$views = [
    new WidgetBigAbstraction(),
    new WidgetMiddleAbstraction(),
    new WidgetSmallAbstraction()
];

foreach ($views as $view) {
    $view->run($productRealization);
    echo "<br>";
    $view->run($categoryRealization);
    echo "<br>";
    $view->run($clientRealisation);
    echo "<br>";
}

?>
</div>
</body>
</html>
