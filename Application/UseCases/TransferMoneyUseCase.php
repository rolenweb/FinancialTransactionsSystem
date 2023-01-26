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

class TransferMoneyUseCase
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
     * @param Account $from
     * @param Account $to
     * @param Amount $amount
     * @return void
     */
    public function handle(Account $from, Account $to, Amount $amount): void
    {
        $from->reduceBalance($amount);
        $to->increaseBalance($amount);
        $this->transactionRepository->addBatch([
            $this->createTransaction($from, $amount, TransactionType::outgoing),
            $this->createTransaction($to, $amount, TransactionType::incoming)
        ]);
    }

    /**
     * @param Account $account
     * @param $amount
     * @param TransactionType $type
     * @return Transaction
     */
    private function createTransaction(Account $account, $amount, TransactionType $type): Transaction
    {
        return new Transaction(
            new Id(3), // It is only for example. In real application it must be UUID or ID is created by DB
            $account,
            new Comment($type->name),
            $amount,
            new DueDate(new \DateTimeImmutable()),
            $type
        );
    }
}