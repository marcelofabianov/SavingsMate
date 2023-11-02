<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Services\Transaction\BankAccount;

use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;
use SavingsMate\Interfaces\Domain\Transaction\Dto\ICreateNewBankAccountDto;
use SavingsMate\Interfaces\Domain\Transaction\Dto\IUpdateBankAccountDto;
use SavingsMate\Interfaces\Domain\Transaction\Entities\IBankAccount;

interface IBankAccountHandle
{
    public function createNewBankAccount(ICreateNewBankAccountDto $dto): IBankAccount;

    public function updateBankAccount(IUuid $bankAccountId, IUpdateBankAccountDto $dto): IBankAccount;

    public function deleteBankAccount(IUuid $bankAccountId): bool;

    public function inactivateBankAccount(IUuid $bankAccountId): bool;

    public function activateBankAccount(IUuid $bankAccountId): bool;
}
