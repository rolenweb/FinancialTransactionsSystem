<?php

namespace App\Domain\ValueObjects;

enum TransactionType
{
    case deposit;
    case withdrawals;
    case outgoing;
    case incoming;
}
