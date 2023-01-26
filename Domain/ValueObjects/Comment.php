<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use InvalidArgumentException;

class Comment
{
    private string $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->assertCommentIsValid($value);
        $this->value = $value;
    }

    private function assertCommentIsValid(string $value): void
    {
        if (strlen($value) > 200) {
            throw new InvalidArgumentException("Comment must be less or equal 200 chars");
        }
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

}