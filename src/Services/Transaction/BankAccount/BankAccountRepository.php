<?php

declare(strict_types=1);

namespace SavingsMate\Services\Transaction\BankAccount;

use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;
use SavingsMate\Interfaces\Domain\Transaction\Entities\IBankAccount;
use SavingsMate\Interfaces\Services\Transaction\BankAccount\IBankAccountRepository;

final readonly class BankAccountRepository implements IBankAccountRepository
{
    public function findBankAccountById(IUuid $bankAccountId): IBankAccount|null
    {
        // TODO: Implement findBankAccountById() method.
    }

    public function findBankAccountsByUserId(IUuid $userId): array
    {
        // TODO: Implement findBankAccountsByUserId() method.
    }
}
