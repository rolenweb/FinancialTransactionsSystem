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

class DepositMoneyUseCase
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
     * @param Amount $amount
     * @return void
     * @todo in real case we have to use DTO instead of params
     */
    public function handle(Account $account, Amount $amount): void
    {
        $account->increaseBalance($amount);
        $transaction = new Transaction(
            new Id(1), // It is only for example. In real application it must be UUID or ID is created by DB
            $account,
            new Comment('You account was deposited'),
            $amount,
            new DueDate(new \DateTimeImmutable()),
            TransactionType::deposit
        );

        $this->transactionRepository->add($transaction);
    }
}