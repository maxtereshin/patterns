<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
</head>
<body style="text-align: left; width: 1100px; margin-left: 23%; font-size: 26px">
<div style="background-color: #e4eff9; padding-left: 30px; padding-bottom: 15px;">
    <h1>Контейнер свойств (англ. property container)<br></h1>

    Фундаментальный шаблон проектирования, который служит для обеспечения возможности динамического расширения свойств уже созданного объекта класса.
    Это достигается путем дополнительных свойств непосредственно самому объекту в некоторый "контейнер свойств", вместо расширения класса новыми свойствами.
</div>


<div style="background-color: black; color: white; margin-top: 50px; padding-left: 10px; padding-bottom: 15px;">
<h3>Пример</h3>
<?php
include 'property_container.php';

$post = new BlogPost();

// присваиваем свойство изначально объявленное в классе
$post->setTitle('Hello');
echo $post->getTitle() . '<br>';

// присваиваем динамические свойства объекту
$post->addProperty('view_count', 100);
$post->updateProperty('view_count', 200);
$post->addProperty('last_update', '2024-09-25');
$post->updateProperty('last_update', '2020-09-26');

echo $post->getProperty('last_update') . '<br>';
echo $post->getProperty('view_count') . '<br>';
$post->deleteProperty('view_count');
echo $post->getProperty('view_count') . '<br>';

?>
</div>
</body>
</html>
