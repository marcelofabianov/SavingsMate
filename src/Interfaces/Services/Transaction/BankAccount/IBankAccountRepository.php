<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Services\Transaction\BankAccount;

use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;
use SavingsMate\Interfaces\Domain\Transaction\Entities\IBankAccount;

interface IBankAccountRepository
{
    public function findBankAccountById(IUuid $bankAccountId): IBankAccount|null;

    public function findBankAccountsByUserId(IUuid $userId): array;
}
