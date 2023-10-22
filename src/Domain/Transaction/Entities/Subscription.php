<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Entities;

use DateTimeInterface;
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
use SavingsMate\Interfaces\Domain\Transaction\Entities\ISubscription;
use SavingsMate\Interfaces\Domain\Transaction\Exceptions\ITransactionEntityException;
use Throwable;

final readonly class Subscription extends Entity implements ISubscription
{
    private function __construct(
        private IUuid $id,
        private IUuid $supplierId,
        private IUuid $categoryId,
        private IUuid $cardId,
        private ?string $description,
        private float $price,
        private DateTimeInterface $startDate,
        private DateTimeInterface $endDate,
        private bool $isAutoRenewal,
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
            'price' => $this->price,
            'startDate' => $this->startDate->format('Y-m-d H:i:s'),
            'endDate' => $this->endDate->format('Y-m-d H:i:s'),
            'isAutoRenewal' => $this->isAutoRenewal,
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
        float $price,
        DateTimeInterface $startDate,
        DateTimeInterface $endDate,
        bool $isAutoRenewal,
        ?string $description = null,
        ?IUuid $id = null,
        ?IInactivatedAt $inactivatedAt = null,
        ?IDeletedAt $deletedAt = null,
        ?ICreatedAt $createdAt = null,
        ?IUpdatedAt $updatedAt = null
    ): ISubscription {
        try {
            return new self(
                id: $id ?? Uuid::random(),
                supplierId: $supplierId,
                categoryId: $categoryId,
                cardId: $cardId,
                description: $description,
                price: $price,
                startDate: $startDate,
                endDate: $endDate,
                isAutoRenewal: $isAutoRenewal,
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
