<?php

declare(strict_types=1);

class Triangle extends Shape
{
    public function __construct(
        private float $a,
        private float $b,
        private float $c,
    ) {
        if ($a <= 0 || $b <= 0 || $c <= 0) {
            throw new InvalidArgumentException('Стороны треугольника должны быть положительными.');
        }
        if ($a + $b <= $c || $a + $c <= $b || $b + $c <= $a) {
            throw new InvalidArgumentException('Треугольник с такими сторонами не существует.');
        }
    }

    public function getName(): string
    {
        return 'Треугольник';
    }

    public function area(): float
    {
        $p = $this->perimeter() / 2;
        return sqrt($p * ($p - $this->a) * ($p - $this->b) * ($p - $this->c));
    }

    public function perimeter(): float
    {
        return $this->a + $this->b + $this->c;
    }
}
