<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Domain\Transaction\Entities;

use SavingsMate\Interfaces\Domain\Core\IEntity;
use SavingsMate\Interfaces\Domain\Transaction\Dto\ICreateNewTransactionDto;

interface ITransaction extends IEntity
{
    public static function create(ICreateNewTransactionDto $dto): self;
}
