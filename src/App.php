<?php

declare(strict_types=1);

namespace SavingsMate;

use SavingsMate\Interfaces\IContainer;
use SavingsMate\Services\Transaction\TransactionServiceContainer;

final readonly class App implements IContainer
{
    public function register(): void
    {
        (new TransactionServiceContainer())->register();
    }
}
