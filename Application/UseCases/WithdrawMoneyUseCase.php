<?php

declare(strict_types=1);

namespace App\Application\UseCases;

use App\Domain\Entities\Account;
use App\Domain\Entities\Transaction;
use App\Domain\Repositories\TransactionRepositoryInterface;
use App\Domain\ValueObjects\Amount;
use App\Domain\ValueObjects\Comment;
use App\Domain\ValueObjects\DueDate;
use App\Domain\ValueObjects\Id;
use App\Domain\ValueObjects\TransactionType;

class WithdrawMoneyUseCase
{
    private TransactionRepositoryInterface $transactionRepository;

    /**
     * @param TransactionRepositoryInterface $transactionRepository
     */
    public function __construct(TransactionRepositoryInterface $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function handle(Account $account, Amount $amount): void
    {
        $account->reduceBalance($amount);
        $transaction = new Transaction(
            new Id(2), // It is only for example. In real application it must be UUID or ID is created by DB
            $account,
            new Comment('withdrawals'),
            $amount,
            new DueDate(new \DateTimeImmutable()),
            TransactionType::withdrawals
        );

        $this->transactionRepository->add($transaction);
    }
}