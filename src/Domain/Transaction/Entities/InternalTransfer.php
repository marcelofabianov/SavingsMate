<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Entities;

use DateTimeInterface;
use SavingsMate\Domain\Core\Entity;
use SavingsMate\Domain\Core\ValueObjects\CreatedAt;
use SavingsMate\Domain\Core\ValueObjects\DeletedAt;
use SavingsMate\Domain\Core\ValueObjects\Uuid;
use SavingsMate\Domain\Transaction\Exceptions\TransactionEntityException;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\ICreatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IDeletedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;
use SavingsMate\Interfaces\Domain\Transaction\Entities\IInternalTransfer;
use SavingsMate\Interfaces\Domain\Transaction\Exceptions\ITransactionEntityException;
use Throwable;

final readonly class InternalTransfer extends Entity implements IInternalTransfer
{
    private function __construct(
        private IUuid $id,
        private IUuid $sourceAccountId,
        private IUuid $destinationAccountId,
        private float $amount,
        private string $description,
        private ?DateTimeInterface $expectedAt,
        private ?DateTimeInterface $confirmedAt,
        private ?DateTimeInterface $cancelledAt,
        private ?DateTimeInterface $reversedAt,
        private IDeletedAt $deletedAt,
        private ICreatedAt $createdAt,
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->toString(),
            'sourceAccountId' => $this->sourceAccountId->toString(),
            'destinationAccountId' => $this->destinationAccountId->toString(),
            'amount' => $this->amount,
            'description' => $this->description,
            'expectedAt' => $this->expectedAt?->format('Y-m-d H:i:s'),
            'confirmedAt' => $this->confirmedAt?->format('Y-m-d H:i:s'),
            'cancelledAt' => $this->cancelledAt?->format('Y-m-d H:i:s'),
            'reversedAt' => $this->reversedAt?->format('Y-m-d H:i:s'),
            'deletedAt' => $this->deletedAt->toString(),
            'createdAt' => $this->createdAt->toString(),
        ];
    }

    /**
     * @throws ITransactionEntityException
     */
    public static function create(
        IUuid $sourceAccountId,
        IUuid $destinationAccountId,
        float $amount,
        string $description,
        ?DateTimeInterface $expectedAt,
        ?DateTimeInterface $confirmedAt,
        ?DateTimeInterface $cancelledAt,
        ?DateTimeInterface $reversedAt,
        ?IUuid $id,
        ?IDeletedAt $deletedAt,
        ?ICreatedAt $createdAt,
    ): IInternalTransfer {
        try {
            return new self(
                id: $id ?? Uuid::random(),
                sourceAccountId: $sourceAccountId,
                destinationAccountId: $destinationAccountId,
                amount: $amount,
                description: $description,
                expectedAt: $expectedAt,
                confirmedAt: $confirmedAt,
                cancelledAt: $cancelledAt,
                reversedAt: $reversedAt,
                deletedAt: $deletedAt ?? DeletedAt::nullable(),
                createdAt: $createdAt ?? CreatedAt::now(),
            );
        } catch (Throwable) {
            throw TransactionEntityException::InvalidEntity(__CLASS__);
        }
    }
}
