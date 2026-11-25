<?php

declare(strict_types=1);

spl_autoload_register(function (string $class): void {
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/src/';

    if (str_starts_with($class, $prefix)) {
        $relative = substr($class, strlen($prefix));
        $file = $baseDir . str_replace('\\', '/', $relative) . '.php';
        if (file_exists($file)) {
            require $file;
        }
    }
});

use App\Book;
use App\Electronics;
use App\Product;

$catalog = [
    new Book('Чистый код', 1000.00),
    new Book('Изучаем PHP 8', 1500.00),
    new Electronics('Смартфон', 30000.00, 10.0),
    new Electronics('Ноутбук', 60000.00, 15.0),
    new Electronics('Наушники', 5000.00, 5.0),
];

$totalFinalPrice = 0.0;

foreach ($catalog as $item) {
    echo $item->getInfo() . PHP_EOL;
    $totalFinalPrice += $item->getFinalPrice();
}

echo sprintf('Сумма конечных цен по каталогу: %.2f руб.', $totalFinalPrice) . PHP_EOL;
echo 'Общее число созданных товаров: ' . Product::getCount() . PHP_EOL;
