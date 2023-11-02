<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Services\Transaction\Transaction;

use DateTimeInterface;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;
use SavingsMate\Interfaces\Domain\Transaction\Dtos\ICreateNewTransactionDto;
use SavingsMate\Interfaces\Domain\Transaction\Entities\ITransaction;

interface ITransactionService
{
    public function __construct(
        ITransactionRepository $repository,
        ITransactionHandle $handle,
    );

    public function findTransactionById(IUuid $transactionId): ITransaction|null;

    public function findTransactionsByUserId(IUuid $userId): array;

    public function findTransactionsByUserIdAndDateRange(
        IUuid $userId,
        DateTimeInterface $startDate,
        DateTimeInterface $endDate
    ): array;

    public function createTransaction(ICreateNewTransactionDto $dto): ITransaction;

    public function updateTransaction(IUuid $transactionId, ITransaction $transaction): ITransaction;

    public function deleteTransaction(IUuid $transactionId): bool;

    public function InactivateTransaction(IUuid $transactionId): bool;

    public function ActivateTransaction(IUuid $transactionId): bool;
}
