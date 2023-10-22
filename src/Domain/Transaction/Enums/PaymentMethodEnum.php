<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Enums;

enum PaymentMethodEnum: int
{
    case CASH = 0;
    case CARD = 1;
    case TRANSFER = 2;
    case OTHER = 3;
}
