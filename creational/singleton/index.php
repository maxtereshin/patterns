<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Паттерны проектирования</title>
</head>
<body style="text-align: left; width: 1100px; margin-left: 23%; font-size: 26px">
<div style="background-color: #e4eff9; padding-left: 30px; padding-bottom: 15px;">
    <h1>Одиночка (англ. Singleton)<br></h1>

    Порождающий паттерн проектирования, который гарантирует, что у класса есть только один экземпляр, и предоставляет к нему глобальную точку доступа.
    В частности, он удобен, когда необходимо контролировать некоторые общие ресурсы. Например, глобальный объект логирования, который должен управлять доступом к файлу журнала.
</div>


<div style="background-color: black; color: white; margin-top: 50px; padding-left: 10px; padding-bottom: 15px;">
<h3>Пример</h3>
<?php
include 'singleton.php';

/**
 * Клиентский код.
 */
Logger::log("Started!");

// Сравниваем значения одиночки-Логгера.
$l1 = Logger::getInstance();
$l2 = Logger::getInstance();
if ($l1 === $l2) {
    Logger::log("Logger has a single instance.");
} else {
    Logger::log("Loggers are different.");
}

// Проверяем, как одиночка-Конфигурация сохраняет данные...
$config1 = Config::getInstance();
$login = "test_login";
$password = "test_password";
$config1->setValue("login", $login);
$config1->setValue("password", $password);
// ...и восстанавливает их.
$config2 = Config::getInstance();
if ($login == $config2->getValue("login") &&
    $password == $config2->getValue("password")
) {
    Logger::log("Config singleton also works fine.");
}

Logger::log("Finished!");

?>
</div>
</body>
</html>
