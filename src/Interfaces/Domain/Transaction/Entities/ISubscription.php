<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Domain\Transaction\Entities;

use DateTimeInterface;
use SavingsMate\Interfaces\Domain\Core\IEntity;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\ICreatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IDeletedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IInactivatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;

interface ISubscription extends IEntity
{
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
    ): self;
}
