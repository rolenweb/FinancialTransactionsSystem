<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\ValueObjects\Amount;
use App\Domain\ValueObjects\Comment;
use App\Domain\ValueObjects\DueDate;
use App\Domain\ValueObjects\Id;
use App\Domain\ValueObjects\TransactionType as Type;

class Transaction
{
    private Id $id;
    private Account $account;
    private Comment $comment;
    private Amount $amount;
    private DueDate $dueDate;
    private Type $type;

    /**
     * @param Id $id
     * @param Account $account
     * @param Comment $comment
     * @param Amount $amount
     * @param DueDate $dueDate
     * @param Type $type
     */
    public function __construct(
        Id $id,
        Account $account,
        Comment $comment,
        Amount $amount,
        DueDate $dueDate,
        Type $type
    ) {
        $this->id = $id;
        $this->account = $account;
        $this->comment = $comment;
        $this->amount = $amount;
        $this->dueDate = $dueDate;
        $this->type = $type;
    }

    /**
     * @return Id
     */
    public function getId(): Id
    {
        return $this->id;
    }

    /**
     * @return Account
     */
    public function getAccount(): Account
    {
        return $this->account;
    }

    /**
     * @return Comment
     */
    public function getComment(): Comment
    {
        return $this->comment;
    }

    /**
     * @return Amount
     */
    public function getAmount(): Amount
    {
        return $this->amount;
    }

    /**
     * @return DueDate
     */
    public function getDueDate(): DueDate
    {
        return $this->dueDate;
    }

    /**
     * @return Type
     */
    public function getType(): Type
    {
        return $this->type;
    }
}