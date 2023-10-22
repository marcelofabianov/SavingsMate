<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core\Entities;

use Exception;
use SavingsMate\Domain\Core\Entity;
use SavingsMate\Domain\Core\Exceptions\SavingsMateEntityException;
use SavingsMate\Domain\Core\ValueObjects\CreatedAt;
use SavingsMate\Domain\Core\ValueObjects\DeletedAt;
use SavingsMate\Domain\Core\ValueObjects\InactivatedAt;
use SavingsMate\Domain\Core\ValueObjects\Password;
use SavingsMate\Domain\Core\ValueObjects\UpdatedAt;
use SavingsMate\Domain\Core\ValueObjects\Uuid;
use SavingsMate\Interfaces\Domain\Core\Entities\IUser;
use SavingsMate\Interfaces\Domain\Core\Exceptions\ISavingsMateEntityException;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\ICreatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IDeletedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IEmail;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IInactivatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IPassword;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;

final readonly class User extends Entity implements IUser
{
    private function __construct(
        private IUuid $id,
        private string $name,
        private IEmail $email,
        private IPassword $password,
        private InactivatedAt $inactivatedAt,
        private IDeletedAt $deletedAt,
        private ICreatedAt $createdAt,
        private IUpdatedAt $updatedAt
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'inactivatedAt' => $this->inactivatedAt,
            'deletedAt' => $this->deletedAt,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    /**
     * @throws ISavingsMateEntityException
     */
    public static function create(
        string $name,
        IEmail $email,
        ?IPassword $password,
        ?IUuid $id,
        ?IInactivatedAt $inactivatedAt,
        ?IDeletedAt $deletedAt,
        ?ICreatedAt $createdAt,
        ?IUpdatedAt $updatedAt
    ): IUser {
        try {
            return new self(
                id: $id ?? Uuid::random(),
                name: $name,
                email: $email,
                password: $password ?? Password::random(),
                inactivatedAt: $inactivatedAt ?? InactivatedAt::nullable(),
                deletedAt: $deletedAt ?? DeletedAt::nullable(),
                createdAt: $createdAt ?? CreatedAt::now(),
                updatedAt: $updatedAt ?? UpdatedAt::now(),
            );
        } catch (Exception) {
            throw SavingsMateEntityException::InvalidEntity(__CLASS__);
        }
    }
}
