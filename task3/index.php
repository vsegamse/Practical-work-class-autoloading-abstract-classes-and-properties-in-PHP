<?php

declare(strict_types=1);

spl_autoload_register(function (string $class): void {
    $path = __DIR__ . '/classes/' . $class . '.php';
    if (file_exists($path)) {
        require $path;
    }
});

$shapes = [
    new Circle(5),
    new Rectangle(4, 6),
    new Triangle(3, 4, 5),
];

foreach ($shapes as $shape) {
    echo $shape->describe() . PHP_EOL;
}

// Попытка создать объект абстрактного класса напрямую приведёт к фатальной ошибке:
// Fatal error: Uncaught Error: Cannot instantiate abstract class Shape
// Потому что абстрактный класс — это неполная заготовка (в нём есть абстрактные
// методы без реализации), предназначенная только для наследования.
// $invalid = new Shape();
