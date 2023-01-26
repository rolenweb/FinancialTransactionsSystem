<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use DateTimeImmutable;

class DueDate
{
    private DateTimeImmutable $value;

    /**
     * @param DateTimeImmutable $value
     */
    public function __construct(DateTimeImmutable $value)
    {
        $this->value = $value;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getValue(): DateTimeImmutable
    {
        return $this->value;
    }
}