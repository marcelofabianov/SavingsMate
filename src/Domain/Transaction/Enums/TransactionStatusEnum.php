<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Enums;

enum TransactionStatusEnum: int
{
    case PENDING = 0;
    case CONFIRMED = 1;
    case CANCELLED = 2;
    case REVERSED = 3;
}
