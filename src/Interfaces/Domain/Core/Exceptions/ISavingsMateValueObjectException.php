<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Domain\Core\Exceptions;

use SavingsMate\Interfaces\Exceptions\ISavingsMateException;

interface ISavingsMateValueObjectException extends ISavingsMateException
{
    public static function invalidValue(string $valueObject, ?string $value = null): self;
}
