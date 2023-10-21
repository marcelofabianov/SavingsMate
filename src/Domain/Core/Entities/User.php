<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core\Entities;

use DateTimeImmutable;
use DateTimeInterface;
use SavingsMate\Domain\Core\Entity;
use SavingsMate\Interfaces\Domain\Core\Entities\IUser;

final readonly class User extends Entity implements IUser
{
    private function __construct(
        private string $id,
        private string $name,
        private string $email,
        private string $password,
        private DateTimeInterface $inactivatedAt,
        private DateTimeInterface $deletedAt,
        private DateTimeInterface $createdAt,
        private DateTimeInterface $updatedAt
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

    public static function create(
        string $name,
        string $email,
        string $password,
        ?string $id,
        ?DateTimeInterface $inactivatedAt,
        ?DateTimeInterface $deletedAt,
        ?DateTimeInterface $createdAt,
        ?DateTimeInterface $updatedAt
    ): IUser {
        try {
            return new self(
                id: $id ?? '',
                name: $name,
                email: $email,
                password: $password,
                inactivatedAt: $inactivatedAt ?? new DateTimeImmutable(),
                deletedAt: $deletedAt ?? new DateTimeImmutable(),
                createdAt: $createdAt ?? new DateTimeImmutable(),
                updatedAt: $updatedAt ?? new DateTimeImmutable()
            );
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
