<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Domain\Core\ValueObjects;

use SavingsMate\Interfaces\Domain\Core\IValueObject;

interface IEmail extends IValueObject
{
    public function getValue(): string;

    public function equals(self $other): bool;

    public static function random(): self;

    public static function validate(string $email): bool;

    public static function create(string|self $value): self;
}
