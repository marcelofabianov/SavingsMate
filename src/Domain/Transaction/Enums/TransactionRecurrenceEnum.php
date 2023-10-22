<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Enums;

enum TransactionRecurrenceEnum: int
{
    case NONE = 0;
    case DAILY = 1;
    case WEEKLY = 2;
    case MONTHLY = 3;
    case YEARLY = 4;
}
