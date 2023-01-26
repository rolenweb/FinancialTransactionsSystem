<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use InvalidArgumentException;

class Balance
{
    private float $value;

    /**
     * @param float $value
     */
    public function __construct(float $value)
    {
        $this->assertBalanceIsValid($value);
        $this->value = $value;
    }

    private function assertBalanceIsValid(float $value): void
    {
        if ($value <= 0) {
            throw new InvalidArgumentException("Balance must be greater than 0");
        }
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
}