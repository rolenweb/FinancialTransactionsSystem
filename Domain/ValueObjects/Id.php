<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use InvalidArgumentException;

class Id
{
    private int $value;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->assertIdIsValid($value);
        $this->value = $value;
    }

    private function assertIdIsValid(int $value): void
    {
        if ($value <= 0) {
            throw new InvalidArgumentException("Id must be greater than 0");
        }
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}