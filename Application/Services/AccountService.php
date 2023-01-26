<?php

declare(strict_types=1);

namespace App\Application\Services;

use App\Domain\Entities\Account;
use App\Domain\Repositories\AccountRepositoryInterface;
use App\Domain\ValueObjects\Balance;

class AccountService
{
    private AccountRepositoryInterface $accountRepository;

    /**
     * @param AccountRepositoryInterface $accountRepository
     */
    public function __construct(AccountRepositoryInterface $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    /**
     * @return Account[]
     */
    public function findAll(): array
    {
        return $this->accountRepository->findAll();
    }

    /**
     * @param Account $id
     * @return Balance
     */
    public function findBalanceByAccount(Account $id): Balance
    {
        return $this->accountRepository->findBalanceByAccount($id);
    }
}