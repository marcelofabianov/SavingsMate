<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Entities;

use SavingsMate\Domain\Core\Entity;
use SavingsMate\Domain\Core\ValueObjects\CreatedAt;
use SavingsMate\Domain\Core\ValueObjects\DeletedAt;
use SavingsMate\Domain\Core\ValueObjects\InactivatedAt;
use SavingsMate\Domain\Core\ValueObjects\UpdatedAt;
use SavingsMate\Domain\Core\ValueObjects\Uuid;
use SavingsMate\Domain\Transaction\Exceptions\TransactionEntityException;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\ICreatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IDeletedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IInactivatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;
use SavingsMate\Interfaces\Domain\Transaction\Entities\IBankAccount;
use SavingsMate\Interfaces\Domain\Transaction\Exceptions\ITransactionEntityException;
use Throwable;

final readonly class BankAccount extends Entity implements IBankAccount
{
    private function __construct(
        private IUuid $id,
        private string $name,
        private ?string $description,
        private IInactivatedAt $inactivatedAt,
        private IDeletedAt $deletedAt,
        private ICreatedAt $createdAt,
        private IUpdatedAt $updatedAt
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->toString(),
            'name' => $this->name,
            'description' => $this->description,
            'inactivatedAt' => $this->inactivatedAt->toString(),
            'deletedAt' => $this->deletedAt->toString(),
            'createdAt' => $this->createdAt->toString(),
            'updatedAt' => $this->updatedAt->toString(),
        ];
    }

    /**
     * @throws ITransactionEntityException
     */
    public static function create(
        string $name,
        ?string $description,
        ?IUuid $id,
        ?IInactivatedAt $inactivatedAt,
        ?IDeletedAt $deletedAt,
        ?ICreatedAt $createdAt,
        ?IUpdatedAt $updatedAt
    ): IBankAccount {
        try {
            return new self(
                id: $id ?? Uuid::random(),
                name: $name,
                description: $description,
                inactivatedAt: $inactivatedAt ?? InactivatedAt::nullable(),
                deletedAt: $deletedAt ?? DeletedAt::nullable(),
                createdAt: $createdAt ?? CreatedAt::now(),
                updatedAt: $updatedAt ?? UpdatedAt::now()
            );
        } catch (Throwable) {
            throw TransactionEntityException::InvalidEntity(__CLASS__);
        }
    }
}
