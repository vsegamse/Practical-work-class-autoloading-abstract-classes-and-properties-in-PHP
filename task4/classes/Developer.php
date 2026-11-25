<?php

declare(strict_types=1);

class Developer extends Employee
{
    private int $experienceYears;

    public function __construct(string $name, float $salary, int $experienceYears)
    {
        parent::__construct($name, $salary);
        $this->experienceYears = $experienceYears;
    }

    public function calculateBonus(): float
    {
        $bonus = $this->salary * 0.15 + $this->experienceYears * 1000;
        return max($bonus, (float) self::MIN_BONUS);
    }
}
