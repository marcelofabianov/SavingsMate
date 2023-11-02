<?php

declare(strict_types=1);

namespace SavingsMate\Services\Transaction\Transaction;

use DateTimeInterface;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;
use SavingsMate\Interfaces\Domain\Transaction\Dtos\ICreateNewTransactionDto;
use SavingsMate\Interfaces\Domain\Transaction\Entities\ITransaction;

final readonly class TransactionService implements \SavingsMate\Interfaces\Services\Transaction\Transaction\ITransactionService
{
    public function __construct(
        private \SavingsMate\Interfaces\Services\Transaction\Transaction\ITransactionRepository $repository,
        private \SavingsMate\Interfaces\Services\Transaction\Transaction\ITransactionHandle $handle,
    ) {
    }

    public function findTransactionById(IUuid $transactionId): ITransaction|null
    {
        return $this->repository->findTransactionById($transactionId);
    }

    public function findTransactionsByUserId(IUuid $userId): array
    {
        return $this->repository->findTransactionsByUserId($userId);
    }

    public function findTransactionsByUserIdAndDateRange(
        IUuid $userId,
        DateTimeInterface $startDate,
        DateTimeInterface $endDate
    ): array {
        return $this->repository->findTransactionsByUserIdAndDateRange(
            $userId,
            $startDate,
            $endDate
        );
    }

    public function createTransaction(ICreateNewTransactionDto $dto): ITransaction
    {
        return $this->handle->createNewTransaction($dto);
    }

    public function updateTransaction(IUuid $transactionId, ITransaction $transaction): ITransaction
    {
        return $this->handle->updateTransaction($transactionId, $transaction);
    }

    public function deleteTransaction(IUuid $transactionId): bool
    {
        return $this->handle->deleteTransaction($transactionId);
    }

    public function InactivateTransaction(IUuid $transactionId): bool
    {
        return $this->handle->inactivateTransaction($transactionId);
    }

    public function ActivateTransaction(IUuid $transactionId): bool
    {
        return $this->handle->activateTransaction($transactionId);
    }
}
