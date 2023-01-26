<?php

declare(strict_types=1);

namespace App\Infrastructure;

use App\Domain\Entities\Account;
use App\Domain\Entities\Transaction;
use App\Domain\Repositories\TransactionRepositoryInterface;

class TransactionRepository implements TransactionRepositoryInterface
{

    public function add(Transaction $transaction): void
    {
        // TODO: Implement add() method.
    }

    public function addBatch(array $transactions): array
    {
        // TODO: Implement addBatch() method.
    }

    public function findAllByAccountOrderByCommentAsc(Account $account): array
    {
        // TODO: Implement findAllByAccountOrderByCommentAsc() method.
    }

    public function findAllByAccountOrderByDueDateAsc(Account $account): array
    {
        // TODO: Implement findAllByAccountOrderByDueDateAsc() method.
    }
}