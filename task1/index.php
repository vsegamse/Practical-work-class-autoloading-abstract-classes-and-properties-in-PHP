<?php

declare(strict_types=1);

spl_autoload_register(function (string $class): void {
    $path = __DIR__ . '/classes/' . $class . '.php';
    if (file_exists($path)) {
        require $path;
    }
});

$user = new User('Иван', 'ivan@example.com');
$product1 = new Product('Ноутбук', 55000.00);
$product2 = new Product('Беспроводная мышь', 1500.50);

$order = new Order($user, [$product1, $product2]);

echo 'Пользователь: ' . $order->getUser()->getInfo() . PHP_EOL;
echo 'Товары в заказе:' . PHP_EOL;
echo '- ' . $product1->getInfo() . PHP_EOL;
echo '- ' . $product2->getInfo() . PHP_EOL;
echo sprintf('Итоговая сумма заказа: %.2f руб.', $order->getTotal()) . PHP_EOL;
