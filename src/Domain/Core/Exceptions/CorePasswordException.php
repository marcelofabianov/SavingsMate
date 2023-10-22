<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core\Exceptions;

use SavingsMate\Domain\Exceptions\SavingsMateException;
use SavingsMate\Interfaces\Domain\Core\Exceptions\ICorePasswordException;

final class CorePasswordException extends SavingsMateException implements ICorePasswordException
{
    public static function InvalidPassword(string $password): ICorePasswordException
    {
        return new self(sprintf('Invalid password: %s', $password));
    }

    public static function InvalidPasswordLength(int $length): ICorePasswordException
    {
        return new self(sprintf('Invalid password length: %s', $length));
    }

    public static function InvalidPasswordStrength(int $strength): ICorePasswordException
    {
        return new self(sprintf('Invalid password strength: %s', $strength));
    }
}
