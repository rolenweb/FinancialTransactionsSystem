<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Domain\Entities\Account;
use App\Domain\ValueObjects\Balance;

interface AccountRepositoryInterface
{
    public function findAll();

    public function findBalanceByAccount(Account $account): Balance;
}