<?php

declare(strict_types=1);

class Circle extends Shape
{
    public function __construct(private float $radius)
    {
        if ($radius <= 0) {
            throw new InvalidArgumentException('Радиус должен быть положительным числом.');
        }
    }

    public function getName(): string
    {
        return 'Круг';
    }

    public function area(): float
    {
        return pi() * $this->radius ** 2;
    }

    public function perimeter(): float
    {
        return 2 * pi() * $this->radius;
    }
}
