<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Enums;

enum TransactionTypeEnum: int
{
    case INCOME = 1;
    case EXPENSE = 0;
}
