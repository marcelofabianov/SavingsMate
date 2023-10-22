<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Domain\Transaction\Exceptions;

use SavingsMate\Interfaces\Exceptions\ISavingsMateException;

interface ITransactionEntityException extends ISavingsMateException
{
    public static function InvalidEntity(string $entity): self;
}
