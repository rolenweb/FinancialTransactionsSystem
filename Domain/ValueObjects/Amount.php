<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use InvalidArgumentException;

class Amount
{
    private float $value;

    /**
     * @param float $value
     */
    public function __construct(float $value)
    {
        $this->assertAmountIsValid($value);
        $this->value = $value;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    private function assertAmountIsValid(float $value): void
    {
        if ($value <= 0) {
            throw new InvalidArgumentException("Balance must be greater than 0");
        }
    }

}