<?php

declare(strict_types=1);

class Rectangle extends Shape
{
    public function __construct(
        private float $width,
        private float $height,
    ) {
        if ($width <= 0 || $height <= 0) {
            throw new InvalidArgumentException('Ширина и высота должны быть положительными числами.');
        }
    }

    public function getName(): string
    {
        return 'Прямоугольник';
    }

    public function area(): float
    {
        return $this->width * $this->height;
    }

    public function perimeter(): float
    {
        return 2 * ($this->width + $this->height);
    }
}
