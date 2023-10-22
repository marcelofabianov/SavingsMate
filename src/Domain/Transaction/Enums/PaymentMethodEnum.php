<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Enums;

enum PaymentMethodEnum: int
{
    case CASH = 0;
    case CARD = 1;
    case CARD_DEBIT = 2;
    case TRANSFER = 3;
    case OTHER = 4;
}
