<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\ValueObjects\Amount;
use App\Domain\ValueObjects\Balance;
use App\Domain\ValueObjects\Id;

class Account
{
    private Id $id;
    private Balance $balance;

    /**
     * @param Id $id
     * @param Balance $balance
     */
    public function __construct(Id $id, Balance $balance)
    {
        $this->id = $id;
        $this->balance = $balance;
    }

    /**
     * @return Id
     */
    public function getId(): Id
    {
        return $this->id;
    }

    /**
     * @return Balance
     */
    public function getBalance(): Balance
    {
        return $this->balance;
    }

    /**
     * @param Amount $amount
     * @return void
     */
    public function increaseBalance(Amount $amount): void
    {
        $this->balance = new Balance($this->balance->getValue() + $amount->getValue());
    }

    /**
     * @param Amount $amount
     * @return void
     */
    public function reduceBalance(Amount $amount): void
    {
        $this->balance = new Balance($this->balance->getValue() - $amount->getValue());
    }
}