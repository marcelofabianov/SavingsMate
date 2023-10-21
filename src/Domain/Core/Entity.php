<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core;

use JsonException;

abstract readonly class Entity
{
    abstract public function toArray(): array;

    /**
     * @throws JsonException
     */
    public function __toString(): string
    {
        return $this->toJson();
    }

    /**
     * @throws JsonException
     */
    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_THROW_ON_ERROR);
    }
}
