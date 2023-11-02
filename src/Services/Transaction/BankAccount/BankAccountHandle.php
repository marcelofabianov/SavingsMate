<?php

declare(strict_types=1);

namespace SavingsMate\Services\Transaction\BankAccount;

use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;
use SavingsMate\Interfaces\Domain\Transaction\Dto\ICreateNewBankAccountDto;
use SavingsMate\Interfaces\Domain\Transaction\Dto\IUpdateBankAccountDto;
use SavingsMate\Interfaces\Domain\Transaction\Entities\IBankAccount;
use SavingsMate\Interfaces\Services\Transaction\BankAccount\IBankAccountHandle;

final readonly class BankAccountHandle implements IBankAccountHandle
{
    public function createNewBankAccount(ICreateNewBankAccountDto $dto): IBankAccount
    {
        // TODO: Implement createNewBankAccount() method.
    }

    public function updateBankAccount(IUuid $bankAccountId, IUpdateBankAccountDto $dto): IBankAccount
    {
        // TODO: Implement updateBankAccount() method.
    }

    public function deleteBankAccount(IUuid $bankAccountId): bool
    {
        // TODO: Implement deleteBankAccount() method.
    }

    public function inactivateBankAccount(IUuid $bankAccountId): bool
    {
        // TODO: Implement inactivateBankAccount() method.
    }

    public function activateBankAccount(IUuid $bankAccountId): bool
    {
        // TODO: Implement activateBankAccount() method.
    }
}
