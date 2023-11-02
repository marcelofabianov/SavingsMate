<?php

declare(strict_types=1);

namespace SavingsMate\Services\Transaction\BankAccount;

use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;
use SavingsMate\Interfaces\Domain\Transaction\Dto\ICreateNewBankAccountDto;
use SavingsMate\Interfaces\Domain\Transaction\Dto\IUpdateBankAccountDto;
use SavingsMate\Interfaces\Domain\Transaction\Entities\IBankAccount;
use SavingsMate\Interfaces\Services\Transaction\BankAccount\IBankAccountHandle;
use SavingsMate\Interfaces\Services\Transaction\BankAccount\IBankAccountRepository;
use SavingsMate\Interfaces\Services\Transaction\BankAccount\IBankAccountService;

final readonly class BankAccountService implements IBankAccountService
{
    public function __construct(
        private IBankAccountRepository $repository,
        private IBankAccountHandle $handle
    ) {
    }

    public function findBankAccountById(IUuid $bankAccountId): IBankAccount|null
    {
        return $this->repository->findBankAccountById($bankAccountId);
    }

    public function findBankAccountsByUserId(IUuid $userId): array
    {
        return $this->repository->findBankAccountsByUserId($userId);
    }

    public function createBankAccount(ICreateNewBankAccountDto $dto): IBankAccount
    {
        return $this->handle->createNewBankAccount($dto);
    }

    public function updateBankAccount(IUuid $bankAccountId, IUpdateBankAccountDto $dto): IBankAccount
    {
        return $this->handle->updateBankAccount($bankAccountId, $dto);
    }

    public function deleteBankAccount(IUuid $bankAccountId): bool
    {
        return $this->handle->deleteBankAccount($bankAccountId);
    }

    public function InactivateBankAccount(IUuid $bankAccountId): bool
    {
        return $this->handle->inactivateBankAccount($bankAccountId);
    }

    public function ActivateBankAccount(IUuid $bankAccountId): bool
    {
        return $this->handle->activateBankAccount($bankAccountId);
    }
}
