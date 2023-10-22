<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Domain\Core\ValueObjects;

use SavingsMate\Interfaces\Domain\Core\IValueObject;

interface IPassword extends IValueObject
{
    public function getValue(): string;

    public function equals(self $password): bool;

    public function hash(string $salt): string;

    public static function match(string $inputPassword, string $hash, string $salt): bool;

    public static function generateSalt(): string;

    public static function random(?int $length = null): self;

    public static function validate(string $value): bool;

    public static function create(string $value): self;
}
