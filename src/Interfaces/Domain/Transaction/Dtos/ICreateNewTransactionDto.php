<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Domain\Transaction\Dtos;

use DateTimeInterface;
use SavingsMate\Domain\Transaction\Enums\PaymentMethodEnum;
use SavingsMate\Domain\Transaction\Enums\PaymentTypeEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionRecurrenceEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionStatusEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionTypeEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionValueTypeEnum;
use SavingsMate\Interfaces\Domain\Core\IDto;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\ICreatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IDeletedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;

/**
 * Interface ICreateNewTransactionDto
 *
 * @property-read IUuid $categoryId
 * @property-read IUuid $supplierId
 * @property-read IUuid|null $cardId
 * @property-read IUuid|null $bankAccountId
 * @property-read IUuid|null $internalTransfer
 * @property-read float $amount
 * @property-read string $description
 * @property-read PaymentMethodEnum $paymentMethod
 * @property-read TransactionTypeEnum $type
 * @property-read TransactionRecurrenceEnum $recurrence
 * @property-read TransactionValueTypeEnum $valueType
 * @property-read TransactionStatusEnum $status
 * @property-read PaymentTypeEnum $paymentType
 * @property-read DateTimeInterface|null $expectedAt
 * @property-read DateTimeInterface|null $confirmedAt
 * @property-read DateTimeInterface|null $cancelledAt
 * @property-read DateTimeInterface|null $reversedAt
 * @property-read DateTimeInterface|null $dueAt
 * @property-read IUuid $id
 * @property-read ICreatedAt $createdAt
 * @property-read IDeletedAt $deletedAt
 */
interface ICreateNewTransactionDto extends IDto
{
    public function __construct(
        IUuid $categoryId,
        IUuid $supplierId,
        ?IUuid $cardId,
        ?IUuid $bankAccountId,
        ?IUuid $internalTransfer,
        float $amount,
        string $description,
        PaymentMethodEnum $paymentMethod,
        TransactionTypeEnum $type,
        TransactionRecurrenceEnum $recurrence,
        TransactionValueTypeEnum $valueType,
        TransactionStatusEnum $status,
        PaymentTypeEnum $paymentType,
        ?DateTimeInterface $expectedAt,
        ?DateTimeInterface $confirmedAt,
        ?DateTimeInterface $cancelledAt,
        ?DateTimeInterface $reversedAt,
        ?DateTimeInterface $dueAt,
        ?IUuid $id,
        ?ICreatedAt $createdAt,
        ?IDeletedAt $deletedAt
    );
}
