<?php

declare(strict_types=1);

namespace App\Infrastructure;

use App\Domain\Entities\Account;
use App\Domain\Repositories\AccountRepositoryInterface;
use App\Domain\ValueObjects\Balance;

class AccountRepository implements AccountRepositoryInterface
{

    public function findAll()
    {
        // TODO: Implement findAll() method.
    }

    public function findBalanceByAccount(Account $account): Balance
    {
        // TODO: Implement findBalanceByAccount() method.
    }
}