<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core\Exceptions;

use SavingsMate\Domain\Exceptions\SavingsMateException;
use SavingsMate\Interfaces\Domain\Core\Exceptions\ISavingsMateEntityException;

final class SavingsMateEntityException extends SavingsMateException implements ISavingsMateEntityException
{
    public static function InvalidEntity(string $entity): ISavingsMateEntityException
    {
        return new self(sprintf('Invalid entity: %s', $entity));
    }
}
