<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Domain\Entities\Account;
use App\Domain\Entities\Transaction;

interface TransactionRepositoryInterface
{
    public function add(Transaction $transaction): void;

    public function addBatch(array $transactions): array;

    public function findAllByAccountOrderByCommentAsc(Account $account): array;

    public function findAllByAccountOrderByDueDateAsc(Account $account): array;
}