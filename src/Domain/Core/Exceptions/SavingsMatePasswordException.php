<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core\Exceptions;

use SavingsMate\Domain\Exceptions\SavingsMateException;
use SavingsMate\Interfaces\Domain\Core\Exceptions\ISavingsMatePasswordException;

final class SavingsMatePasswordException extends SavingsMateException implements ISavingsMatePasswordException
{
    public static function InvalidPassword(string $password): ISavingsMatePasswordException
    {
        return new self(sprintf('Invalid password: %s', $password));
    }

    public static function InvalidPasswordLength(int $length): ISavingsMatePasswordException
    {
        return new self(sprintf('Invalid password length: %s', $length));
    }

    public static function InvalidPasswordStrength(int $strength): ISavingsMatePasswordException
    {
        return new self(sprintf('Invalid password strength: %s', $strength));
    }
}
