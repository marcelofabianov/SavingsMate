<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Entities;

use Exception;
use SavingsMate\Domain\Core\Entity;
use SavingsMate\Domain\Core\Exceptions\SavingsMateEntityException;
use SavingsMate\Domain\Core\ValueObjects\CreatedAt;
use SavingsMate\Domain\Core\ValueObjects\DeletedAt;
use SavingsMate\Domain\Core\ValueObjects\InactivatedAt;
use SavingsMate\Domain\Core\ValueObjects\UpdatedAt;
use SavingsMate\Domain\Core\ValueObjects\Uuid;
use SavingsMate\Domain\Transaction\Enums\CategoryColorEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionTypeEnum;
use SavingsMate\Interfaces\Domain\Core\Exceptions\ISavingsMateEntityException;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\ICreatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IDeletedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IInactivatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;
use SavingsMate\Interfaces\Domain\Transaction\Entities\ICategory;

final readonly class Category extends Entity implements ICategory
{
    private function __construct(
        private IUuid $id,
        private string $name,
        private CategoryColorEnum $color,
        private TransactionTypeEnum $type,
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
            'color' => $this->color->value,
            'type' => $this->type->value,
            'inactivatedAt' => $this->inactivatedAt->toString(),
            'deletedAt' => $this->deletedAt->toString(),
            'createdAt' => $this->createdAt->toString(),
            'updatedAt' => $this->updatedAt->toString(),
        ];
    }

    /**
     * @throws ISavingsMateEntityException
     */
    public static function create(
        string $name,
        CategoryColorEnum $color,
        TransactionTypeEnum $type,
        ?IUuid $id,
        ?IInactivatedAt $inactivatedAt,
        ?IDeletedAt $deletedAt,
        ?ICreatedAt $createdAt,
        ?IUpdatedAt $updatedAt
    ): ICategory {
        try {
            return new self(
                id: $id ?? Uuid::random(),
                name: $name,
                color: $color,
                type: $type,
                inactivatedAt: $inactivatedAt ?? InactivatedAt::nullable(),
                deletedAt: $deletedAt ?? DeletedAt::nullable(),
                createdAt: $createdAt ?? CreatedAt::now(),
                updatedAt: $updatedAt ?? UpdatedAt::now()
            );
        } catch (Exception) {
            throw SavingsMateEntityException::InvalidEntity(__CLASS__);
        }
    }
}
