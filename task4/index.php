<?php

declare(strict_types=1);

spl_autoload_register(function (string $class): void {
    $path = __DIR__ . '/classes/' . $class . '.php';
    if (file_exists($path)) {
        require $path;
    }
});

$employees = [
    new Manager('Анна Смирнова', 80000),
    new Manager('Дмитрий Козлов', 2000), // премия 20% = 400 < MIN_BONUS -> вернёт 500
    new Developer('Алексей Петров', 100000, 3),
    new Developer('Мария Иванова', 120000, 5),
    new Developer('Егор Новиков', 3000, 0), // премия 15% = 450 < MIN_BONUS -> вернёт 500
];

$totalPayout = 0.0;

foreach ($employees as $employee) {
    echo $employee->getInfo() . PHP_EOL;
    $totalPayout += $employee->getTotalPay();
}

echo sprintf('Общая сумма выплат: %.2f руб.', $totalPayout) . PHP_EOL;
echo 'Количество сотрудников: ' . Employee::getEmployeeCount() . PHP_EOL;
