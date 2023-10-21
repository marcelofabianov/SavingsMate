<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core\ValueObjects;

use SavingsMate\Domain\Core\ValueObject;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;

final readonly class Uuid extends ValueObject implements IUuid
{
    private function __construct(
        public string $value
    ) {
    }

    public function __toString(): string
    {
        return '';
    }

    public static function create(): IUuid
    {
        return new self('');
    }
}
