<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Domain\Core\ValueObjects;

use DateTimeInterface;
use SavingsMate\Interfaces\Domain\Core\IValueObject;

interface IUpdatedAt extends IValueObject
{
    public function getValue(): DateTimeInterface;

    public function toIso8601(): string;

    public function format(string $format): string|null;

    public static function now(): self;

    public static function random(): self;

    public static function validate(string|DateTimeInterface $value): bool;
}
