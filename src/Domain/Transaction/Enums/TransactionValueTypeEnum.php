<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Enums;

enum TransactionValueTypeEnum: int
{
    case VARIABLE = 0;
    case FIXED = 1;
}
