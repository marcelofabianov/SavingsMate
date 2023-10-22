<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Domain\Core\ValueObjects;

use DateTimeInterface;
use SavingsMate\Interfaces\Domain\Core\IDateTime;
use SavingsMate\Interfaces\Domain\Core\INullable;
use SavingsMate\Interfaces\Domain\Core\IValueObject;

interface IInactivatedAt extends IValueObject, INullable, IDateTime
{
    public static function random(): self;

    public static function now(): self;

    public static function create(string|null|DateTimeInterface $value): self;
}
