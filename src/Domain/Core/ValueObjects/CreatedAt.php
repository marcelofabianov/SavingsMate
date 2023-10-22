<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core\ValueObjects;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use SavingsMate\Domain\Core\Exceptions\SavingsMateValueObjectException;
use SavingsMate\Domain\Core\ValueObject;
use SavingsMate\Interfaces\Domain\Core\Exceptions\ISavingsMateValueObjectException;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\ICreatedAt;

final readonly class CreatedAt extends ValueObject implements ICreatedAt
{
    private const DEFAULT_FORMAT = 'Y-m-d H:i:s';

    private function __construct(
        private DateTimeInterface $value
    ) {
    }

    public function __toString(): string
    {
        return $this->value->format(self::DEFAULT_FORMAT);
    }

    public function getValue(): DateTimeInterface
    {
        return $this->value;
    }

    public function toIso8601(): string
    {
        return $this->value->format(DateTimeInterface::ATOM);
    }

    public function format(string $format = self::DEFAULT_FORMAT): string|null
    {
        try {
            return $this->value->format($format);
        } catch (Exception) {
            return null;
        }
    }

    /**
     * @throws Exception
     */
    public static function random(): ICreatedAt
    {
        $random = (new DateTime('now'))
            ->setDate(random_int(2000, (int) date('Y')), random_int(1, 12), random_int(1, 28));

        return new self($random);
    }

    public static function now(): ICreatedAt
    {
        return new self(new DateTimeImmutable());
    }

    /**
     * @throws Exception
     */
    public static function validate(string|DateTimeInterface $value): bool
    {
        if ($value === '') {
            return false;
        }

        if ($value instanceof DateTimeInterface) {
            return true;
        }

        try {
            new DateTime($value);
        } catch (Exception) {
            return false;
        }

        return true;
    }

    /**
     * @throws ISavingsMateValueObjectException
     * @throws Exception
     */
    public static function create(string|DateTimeInterface $value): ICreatedAt
    {
        if (! self::validate($value)) {
            throw SavingsMateValueObjectException::invalidValue('CreatedAt', $value);
        }

        if ($value instanceof DateTimeInterface) {
            return new self($value);
        }

        return new self(new DateTime($value));
    }
}