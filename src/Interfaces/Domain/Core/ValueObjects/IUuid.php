<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Domain\Core\ValueObjects;

use SavingsMate\Interfaces\Domain\Core\IValueObject;

interface IUuid extends IValueObject
{
    public function equals(self $other): bool;

    public function getValue(): string;

    public static function random(): self;

    public static function validate(string $value): bool;

    public static function create(string $value): self;
}
