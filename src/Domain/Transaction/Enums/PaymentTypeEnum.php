<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Enums;

enum PaymentTypeEnum: int
{
    case SINGLE = 0;
    case INSTALLMENTS = 1;
    case SUBSCRIPTION = 2;
}
