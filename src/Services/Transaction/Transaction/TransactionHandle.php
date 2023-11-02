<?php

declare(strict_types=1);

namespace SavingsMate\Services\Transaction\Transaction;

use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;
use SavingsMate\Interfaces\Domain\Transaction\Dtos\ICreateNewTransactionDto;
use SavingsMate\Interfaces\Domain\Transaction\Entities\ITransaction;
use SavingsMate\Interfaces\Services\Transaction\Transaction\ITransactionHandle;

final readonly class TransactionHandle implements ITransactionHandle
{
    public function createNewTransaction(ICreateNewTransactionDto $dto): ITransaction
    {
        //
    }

    public function updateTransaction(IUuid $transactionId, ITransaction $transaction): ITransaction
    {
        //
    }

    public function deleteTransaction(IUuid $transactionId): bool
    {
        //
    }

    public function inactivateTransaction(IUuid $transactionId): bool
    {
        //
    }

    public function activateTransaction(IUuid $transactionId): bool
    {
        //
    }
}
