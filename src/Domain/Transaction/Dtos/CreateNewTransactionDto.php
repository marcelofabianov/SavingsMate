<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Dtos;

use DateTimeInterface;
use SavingsMate\Domain\Core\ValueObjects\CreatedAt;
use SavingsMate\Domain\Core\ValueObjects\DeletedAt;
use SavingsMate\Domain\Core\ValueObjects\Uuid;
use SavingsMate\Domain\Transaction\Enums\PaymentMethodEnum;
use SavingsMate\Domain\Transaction\Enums\PaymentTypeEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionRecurrenceEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionStatusEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionTypeEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionValueTypeEnum;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\ICreatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IDeletedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;
use SavingsMate\Interfaces\Domain\Transaction\Dtos\ICreateNewTransactionDto;

final readonly class CreateNewTransactionDto implements ICreateNewTransactionDto
{
    public IUuid $id;

    public ICreatedAt $createdAt;

    public IDeletedAt $deletedAt;

    public function __construct(
        public IUuid $categoryId,
        public IUuid $supplierId,
        public ?IUuid $cardId,
        public ?IUuid $bankAccountId,
        public float $amount,
        public string $description,
        public PaymentMethodEnum $paymentMethod,
        public TransactionTypeEnum $type,
        public TransactionRecurrenceEnum $recurrence,
        public TransactionValueTypeEnum $valueType,
        public TransactionStatusEnum $status,
        public PaymentTypeEnum $paymentType,
        public ?DateTimeInterface $expectedAt,
        public ?DateTimeInterface $confirmedAt,
        public ?DateTimeInterface $cancelledAt,
        public ?DateTimeInterface $reversedAt,
        public ?DateTimeInterface $dueAt,
        ?IUuid $id,
        ?ICreatedAt $createdAt,
        ?IDeletedAt $deletedAt
    ) {
        $this->id = $id ?? Uuid::random();
        $this->createdAt = $createdAt ?? CreatedAt::now();
        $this->deletedAt = $deletedAt ?? DeletedAt::nullable();
    }
}
