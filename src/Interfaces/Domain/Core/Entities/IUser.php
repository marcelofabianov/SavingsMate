<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Domain\Core\Entities;

use DateTimeInterface;
use SavingsMate\Interfaces\Domain\Core\IEntity;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\ICreatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IDeletedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;

interface IUser extends IEntity
{
    public static function create(
        string $name,
        string $email,
        string $password,
        ?IUuid $id,
        ?DateTimeInterface $inactivatedAt,
        ?IDeletedAt $deletedAt,
        ?ICreatedAt $createdAt,
        ?IUpdatedAt $updatedAt
    ): self;
}
