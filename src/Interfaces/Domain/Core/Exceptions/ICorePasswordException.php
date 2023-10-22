<?php

declare(strict_types=1);

namespace SavingsMate\Interfaces\Domain\Core\Exceptions;

use SavingsMate\Interfaces\Exceptions\ISavingsMateException;

interface ICorePasswordException extends ISavingsMateException
{
    public static function InvalidPassword(string $password): self;

    public static function InvalidPasswordLength(int $length): self;

    public static function InvalidPasswordStrength(int $strength): self;
}
