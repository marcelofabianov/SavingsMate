<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Domain\Core\Exceptions;

use SavingsMate\Interfaces\Exceptions\ISavingsMateException;

interface ISavingsMateEntityException extends ISavingsMateException
{
    public static function InvalidEntity(string $entity): self;
}
