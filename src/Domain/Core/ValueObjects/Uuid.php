<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core\ValueObjects;

use Ramsey\Uuid\Uuid as UuidBase;
use SavingsMate\Domain\Core\Exceptions\SavingsMateValueObjectException;
use SavingsMate\Domain\Core\ValueObject;
use SavingsMate\Interfaces\Domain\Core\Exceptions\ISavingsMateValueObjectException;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IUuid;

final readonly class Uuid extends ValueObject implements IUuid
{
    private function __construct(
        private string $value
    ) {
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function equals(IUuid $other): bool
    {
        return $this->value === $other->getValue();
    }

    public static function random(): IUuid
    {
        return new self(UuidBase::uuid4()->toString());
    }

    public static function validate(string $value): bool
    {
        if ($value === '') {
            return false;
        }

        return UuidBase::isValid($value);
    }

    /**
     * @throws ISavingsMateValueObjectException
     */
    public static function create(string $value): IUuid
    {
        if (! self::validate($value)) {
            throw SavingsMateValueObjectException::invalidValue('Uuid', $value);
        }

        return new self($value);
    }
}
