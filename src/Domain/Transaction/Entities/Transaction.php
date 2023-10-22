<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Entities;

use DateTimeInterface;
use SavingsMate\Domain\Core\Entity;
use SavingsMate\Domain\Transaction\Enums\PaymentMethodEnum;
use SavingsMate\Domain\Transaction\Enums\PaymentTypeEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionRecurrenceEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionStatusEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionTypeEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionValueTypeEnum;
use SavingsMate\Domain\Transaction\Exceptions\TransactionEntityException;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\ICreatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IDeletedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;
use SavingsMate\Interfaces\Domain\Transaction\Dtos\ICreateNewTransactionDto;
use SavingsMate\Interfaces\Domain\Transaction\Entities\ITransaction;
use SavingsMate\Interfaces\Domain\Transaction\Exceptions\ITransactionEntityException;
use Throwable;

final readonly class Transaction extends Entity implements ITransaction
{
    private function __construct(
        private IUuid $id,
        private IUuid $categoryId,
        private Iuuid $supplierId,
        private ?IUuid $cardId,
        private ?IUuid $bankAccountId,
        private float $amount,
        private ?DateTimeInterface $expectedAt,
        private ?DateTimeInterface $confirmedAt,
        private ?DateTimeInterface $cancelledAt,
        private ?DateTimeInterface $reversedAt,
        private string $description,
        private PaymentMethodEnum $paymentMethod,
        private TransactionTypeEnum $type,
        private TransactionRecurrenceEnum $recurrence,
        private TransactionValueTypeEnum $valueType,
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
            'supplierId' => $this->supplierId->toString(),
            'cardId' => $this->cardId?->toString(),
            'bankAccountId' => $this->bankAccountId?->toString(),
            'amount' => $this->amount,
            'expectedAt' => $this->expectedAt?->format('Y-m-d H:i:s'),
            'confirmedAt' => $this->confirmedAt?->format('Y-m-d H:i:s'),
            'cancelledAt' => $this->cancelledAt?->format('Y-m-d H:i:s'),
            'reversedAt' => $this->reversedAt?->format('Y-m-d H:i:s'),
            'description' => $this->description,
            'paymentMethod' => $this->paymentMethod->value,
            'type' => $this->type->value,
            'recurrence' => $this->recurrence->value,
            'valueType' => $this->valueType->value,
            'status' => $this->status->value,
            'paymentType' => $this->paymentType->value,
            'createdAt' => $this->createdAt->toString(),
            'deletedAt' => $this->deletedAt->toString(),
        ];
    }

    /**
     * @throws ITransactionEntityException
     */
    public static function create(ICreateNewTransactionDto $dto): ITransaction
    {
        try {
            return new self(
                id: $dto->id,
                categoryId: $dto->categoryId,
                supplierId: $dto->supplierId,
                cardId: $dto->cardId,
                bankAccountId: $dto->bankAccountId,
                amount: $dto->amount,
                expectedAt: $dto->expectedAt,
                confirmedAt: $dto->confirmedAt,
                cancelledAt: $dto->cancelledAt,
                reversedAt: $dto->reversedAt,
                description: $dto->description,
                paymentMethod: $dto->paymentMethod,
                type: $dto->type,
                recurrence: $dto->recurrence,
                valueType: $dto->valueType,
                status: $dto->status,
                paymentType: $dto->paymentType,
                createdAt: $dto->createdAt,
                deletedAt: $dto->deletedAt
            );
        } catch (Throwable) {
            throw TransactionEntityException::InvalidEntity(__CLASS__);
        }
    }
}
