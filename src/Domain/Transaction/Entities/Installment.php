<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Entities;

use SavingsMate\Domain\Core\Entity;
use SavingsMate\Domain\Core\ValueObjects\CreatedAt;
use SavingsMate\Domain\Core\ValueObjects\DeletedAt;
use SavingsMate\Domain\Core\ValueObjects\InactivatedAt;
use SavingsMate\Domain\Core\ValueObjects\UpdatedAt;
use SavingsMate\Domain\Core\ValueObjects\Uuid;
use SavingsMate\Domain\Transaction\Exceptions\TransactionEntityException;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\ICreatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IDeletedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IInactivatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;
use SavingsMate\Interfaces\Domain\Transaction\Entities\IInstallment;
use SavingsMate\Interfaces\Domain\Transaction\Exceptions\ITransactionEntityException;
use Throwable;

final readonly class Installment extends Entity implements IInstallment
{
    private function __construct(
        private IUuid $id,
        private IUuid $supplierId,
        private IUuid $categoryId,
        private IUuid $cardId,
        private ?string $description,
        private float $totalAmount,
        private float $installmentValue,
        private int $numberOfInstallments,
        private int $dayOfPayment,
        private bool $hasInterestAdded,
        private IInactivatedAt $inactivatedAt,
        private IDeletedAt $deletedAt,
        private ICreatedAt $createdAt,
        private IUpdatedAt $updatedAt
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->toString(),
            'supplierId' => $this->supplierId->toString(),
            'categoryId' => $this->categoryId->toString(),
            'cardId' => $this->cardId->toString(),
            'description' => $this->description,
            'totalAmount' => $this->totalAmount,
            'installmentValue' => $this->installmentValue,
            'numberOfInstallments' => $this->numberOfInstallments,
            'dayOfPayment' => $this->dayOfPayment,
            'hasInterestAdded' => $this->hasInterestAdded,
            'inactivatedAt' => $this->inactivatedAt->toString(),
            'deletedAt' => $this->deletedAt->toString(),
            'createdAt' => $this->createdAt->toString(),
            'updatedAt' => $this->updatedAt->toString(),
        ];
    }

    /**
     * @throws ITransactionEntityException
     */
    public static function create(
        IUuid $supplierId,
        IUuid $categoryId,
        IUuid $cardId,
        float $totalAmount,
        float $installmentValue,
        int $numberOfInstallments,
        int $dayOfPayment,
        bool $hasInterestAdded,
        ?string $description = null,
        ?IUuid $id = null,
        ?IInactivatedAt $inactivatedAt = null,
        ?IDeletedAt $deletedAt = null,
        ?ICreatedAt $createdAt = null,
        ?IUpdatedAt $updatedAt = null,
    ): IInstallment {
        try {
            return new self(
                id: $id ?? Uuid::random(),
                supplierId: $supplierId,
                categoryId: $categoryId,
                cardId: $cardId,
                description: $description,
                totalAmount: $totalAmount,
                installmentValue: $installmentValue,
                numberOfInstallments: $numberOfInstallments,
                dayOfPayment: $dayOfPayment,
                hasInterestAdded: $hasInterestAdded,
                inactivatedAt: $inactivatedAt ?? InactivatedAt::nullable(),
                deletedAt: $deletedAt ?? DeletedAt::nullable(),
                createdAt: $createdAt ?? CreatedAt::now(),
                updatedAt: $updatedAt ?? UpdatedAt::now(),
            );
        } catch (Throwable) {
            throw TransactionEntityException::InvalidEntity(__CLASS__);
        }
    }
}
