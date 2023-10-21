<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Domain\Core\Exceptions;

interface ISavingsMateValueObjectException
{
    public static function invalidValue(string $value): self;
}
