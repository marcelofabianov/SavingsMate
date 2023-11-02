<?php

declare(strict_types=1);

namespace SavingsMate\Services\Transaction\Transaction;

use DateTimeInterface;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;
use SavingsMate\Interfaces\Domain\Transaction\Entities\ITransaction;
use SavingsMate\Interfaces\Services\Transaction\Transaction\ITransactionRepository;

final readonly class TransactionRepository implements ITransactionRepository
{
    public function findTransactionById(IUuid $transactionId): ITransaction|null
    {
        //
    }

    public function findTransactionsByUserId(IUuid $userId): array
    {
        //
    }

    public function findTransactionsByUserIdAndDateRange(
        IUuid $userId,
        DateTimeInterface $startDate,
        DateTimeInterface $endDate
    ): array {
        //
    }
}
