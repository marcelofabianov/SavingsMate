<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Entities;

use DateTimeInterface;
use SavingsMate\Domain\Core\Entity;
use SavingsMate\Domain\Core\Exceptions\SavingsMateEntityException;
use SavingsMate\Domain\Transaction\Enums\PaymentMethodEnum;
use SavingsMate\Domain\Transaction\Enums\PaymentTypeEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionRecurrenceEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionStatusEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionTypeEnum;
use SavingsMate\Interfaces\Domain\Core\Exceptions\ISavingsMateEntityException;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\ICreatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IDeletedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;
use SavingsMate\Interfaces\Domain\Transaction\Dtos\ICreateNewTransactionDto;
use SavingsMate\Interfaces\Domain\Transaction\Entities\ITransaction;

final readonly class Transaction extends Entity implements ITransaction
{
    private function __construct(
        private IUuid $id,
        private IUuid $categoryId,
        private float $amount,
        private ?DateTimeInterface $expectedAt,
        private ?DateTimeInterface $confirmedAt,
        private ?DateTimeInterface $cancelledAt,
        private ?DateTimeInterface $reversedAt,
        private string $description,
        private PaymentMethodEnum $paymentMethod,
        private TransactionTypeEnum $type,
        private TransactionRecurrenceEnum $recurrence,
        private TransactionStatusEnum $status,
        private PaymentTypeEnum $paymentType,
        private ICreatedAt $createdAt,
        private IDeletedAt $deletedAt
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->toString(),
            'categoryId' => $this->categoryId->toString(),
            'amount' => $this->amount,
            'expectedAt' => $this->expectedAt?->format('Y-m-d H:i:s'),
            'confirmedAt' => $this->confirmedAt?->format('Y-m-d H:i:s'),
            'cancelledAt' => $this->cancelledAt?->format('Y-m-d H:i:s'),
            'reversedAt' => $this->reversedAt?->format('Y-m-d H:i:s'),
            'description' => $this->description,
            'paymentMethod' => $this->paymentMethod->value,
            'type' => $this->type->value,
            'recurrence' => $this->recurrence->value,
            'status' => $this->status->value,
            'paymentType' => $this->paymentType->value,
            'createdAt' => $this->createdAt->toString(),
            'deletedAt' => $this->deletedAt->toString(),
        ];
    }

    /**
     * @throws ISavingsMateEntityException
     */
    public static function create(ICreateNewTransactionDto $dto): ITransaction
    {
        try {
            return new self(
                id: $dto->id,
                categoryId: $dto->categoryId,
                amount: $dto->amount,
                expectedAt: $dto->expectedAt,
                confirmedAt: $dto->confirmedAt,
                cancelledAt: $dto->cancelledAt,
                reversedAt: $dto->reversedAt,
                description: $dto->description,
                paymentMethod: $dto->paymentMethod,
                type: $dto->type,
                recurrence: $dto->recurrence,
                status: $dto->status,
                paymentType: $dto->paymentType,
                createdAt: $dto->createdAt,
                deletedAt: $dto->deletedAt
            );
        } catch (\Throwable) {
            throw SavingsMateEntityException::InvalidEntity(__CLASS__);
        }
    }
}
