<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Domain\Transaction\Entities;

use DateTimeInterface;
use SavingsMate\Interfaces\Domain\Core\IEntity;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\ICreatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IDeletedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;

interface IInternalTransfer extends IEntity
{
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
    ): self;
}
