<?php

declare(strict_types=1);

namespace App\Application\Services;

use App\Domain\Entities\Account;
use App\Domain\Entities\Transaction;
use App\Domain\Repositories\TransactionRepositoryInterface;

class TransactionService
{
    private TransactionRepositoryInterface $transactionRepository;

    /**
     * @param TransactionRepositoryInterface $transactionRepository
     */
    public function __construct(TransactionRepositoryInterface $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    /**
     * @param Account $account
     * @return Transaction[]
     */
    public function findByAccountOrderByCommentAsc(Account $account): array
    {
        return $this->transactionRepository->findAllByAccountOrderByCommentAsc($account);
    }

    /**
     * @param Account $account
     * @return Transaction[]
     */
    public function findByAccountOrderByDueDateAsc(Account $account): array
    {
        return $this->transactionRepository->findAllByAccountOrderByDueDateAsc($account);
    }
}