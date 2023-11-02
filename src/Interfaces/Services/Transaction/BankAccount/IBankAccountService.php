<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Services\Transaction\BankAccount;

use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;
use SavingsMate\Interfaces\Domain\Transaction\Dto\ICreateNewBankAccountDto;
use SavingsMate\Interfaces\Domain\Transaction\Dto\IUpdateBankAccountDto;
use SavingsMate\Interfaces\Domain\Transaction\Entities\IBankAccount;

interface IBankAccountService
{
    public function __construct(IBankAccountRepository $repository, IBankAccountHandle $handle);

    public function findBankAccountById(IUuid $bankAccountId): IBankAccount|null;

    public function findBankAccountsByUserId(IUuid $userId): array;

    public function createBankAccount(ICreateNewBankAccountDto $dto): IBankAccount;

    public function updateBankAccount(IUuid $bankAccountId, IUpdateBankAccountDto $dto): IBankAccount;

    public function deleteBankAccount(IUuid $bankAccountId): bool;

    public function InactivateBankAccount(IUuid $bankAccountId): bool;

    public function ActivateBankAccount(IUuid $bankAccountId): bool;
}
