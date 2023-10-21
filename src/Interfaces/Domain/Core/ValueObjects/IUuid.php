<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Domain\Core\ValueObjects;

use SavingsMate\Interfaces\Domain\Core\IValueObject;

interface IUuid extends IValueObject
{
    public static function create(string $value): self;
}
