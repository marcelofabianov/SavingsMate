<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Domain\Core;

interface IValueObject
{
    public function __toString(): string;
}
