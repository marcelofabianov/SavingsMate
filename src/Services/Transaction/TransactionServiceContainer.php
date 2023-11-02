<?php

declare(strict_types=1);

namespace SavingsMate\Services\Transaction;

use SavingsMate\Interfaces\IContainer;

final readonly class TransactionServiceContainer implements IContainer
{
    public function register(): void
    {
        $this->bankAccount();
    }

    private function bankAccount(): void
    {
        //
    }
}
