<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Domain\Core;

interface IEntity
{
    public function __toString(): string;

    public function toArray(): array;

    public function toJson(): string;
}
