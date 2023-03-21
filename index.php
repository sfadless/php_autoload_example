<?php

declare(strict_types=1);

/**
 * Хочу обозначить, что в директории src лежит пространство имен MyAwesomeNamespace\ExampleClass
 *
 * т.е.
 * класс MyAwesomeNamespace\ExampleClass находится в файле ./src/ExampleClass.php
 * класс MyAwesomeNamespace\AwesomeDirectory\ClassInDirectory находится в файле ./src/AwesomeDirectory/ClassInDirectory.php
 *
 * Функция, которую мы передаем первым аргументом, вызывается в тот момент, когда мы впервые обращаемся к классу,
 * указывая пространство имен
 */
spl_autoload_register(function (string $namespace) {
    // в $namespace приходит полное название класса MyAwesomeNamespace\ExampleClass
    $classesDir = __DIR__ . '/src/';

    /* так как уже обозначено, что в src лежит MyAwesomeNamespace\ExampleClass , то мне нужно из полного пространства
    имен убрать MyAwesomeNamespace\ExampleClass */
    $namespaceFromSrc = str_replace("MyAwesomeNamespace\\", "", $namespace);

    // Теперь я должен убрать заменить символ "\" на символ "/", чтобы использовать полный путь к файлу
    $fileName = str_replace("\\", "/", $namespaceFromSrc) . '.php';

    // Сейчас у нас есть полный путь к файлу с нашим пространством имен, и мы его просто подключаем через require_once
    require_once $classesDir . $fileName;
});

$exampleClass = new \MyAwesomeNamespace\ExampleClass();
$exampleClass = new \MyAwesomeNamespace\AwesomeDirectory\ClassInDirectory();