<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core\Exceptions;

use SavingsMate\Domain\Exceptions\SavingsMateException;
use SavingsMate\Interfaces\Domain\Core\Exceptions\ISavingsMateValueObjectException;

final class SavingsMateValueObjectException extends SavingsMateException implements ISavingsMateValueObjectException
{
    public static function invalidValue(string $valueObject, ?string $value = null): ISavingsMateValueObjectException
    {
        return new self(sprintf('Invalid value for %s: %s', $valueObject, $value ?? ''));
    }
}
