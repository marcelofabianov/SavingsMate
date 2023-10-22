<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Domain\Transaction\Entities;

use SavingsMate\Interfaces\Domain\Core\IEntity;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\ICreatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IDeletedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IInactivatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;

interface IInstallment extends IEntity
{
    public static function create(
        IUuid $supplierId,
        IUuid $categoryId,
        IUuid $cardId,
        float $totalAmount,
        float $installmentValue,
        int $numberOfInstallments,
        int $dayOfPayment,
        bool $hasInterestAdded,
        ?string $description,
        ?IUuid $id,
        ?IInactivatedAt $inactivatedAt,
        ?IDeletedAt $deletedAt,
        ?ICreatedAt $createdAt,
        ?IUpdatedAt $updatedAt
    ): self;
}
