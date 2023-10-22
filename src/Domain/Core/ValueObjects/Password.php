<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core\ValueObjects;

use Exception;
use SavingsMate\Domain\Core\Exceptions\SavingsMatePasswordException;
use SavingsMate\Domain\Core\ValueObject;
use SavingsMate\Interfaces\Domain\Core\Exceptions\ISavingsMatePasswordException;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IPassword;

final readonly class Password extends ValueObject implements IPassword
{
    private const MIN_LENGTH = 8;

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

    public function equals(IPassword $password): bool
    {
        return $this->value === $password->getValue();
    }

    public function hash(string $salt): string
    {
        return password_hash($this->value, PASSWORD_BCRYPT).$salt;
    }

    public static function match(string $inputPassword, string $hash, string $salt): bool
    {
        return password_verify($inputPassword.$salt, $hash);
    }

    /**
     * @throws Exception
     */
    public static function generateSalt(): string
    {
        return base64_encode(bin2hex(random_bytes(random_int(22, 32))));
    }

    /**
     * @throws Exception
     */
    public static function random(?int $length = null): IPassword
    {
        if ($length !== null && $length < self::MIN_LENGTH) {
            throw SavingsMatePasswordException::InvalidPasswordLength($length);
        }

        $length = random_int(self::MIN_LENGTH + 2, $length ?? self::MIN_LENGTH * random_int(2, 3));
        $randomString = self::randomString($length);

        if (! self::validate($randomString)) {
            self::random($length);
        }

        return new self($randomString);
    }

    public static function validate(string $value): bool
    {
        if (strlen($value) < self::MIN_LENGTH) {
            return false;
        }

        if (
            ! preg_match('/[0-9]/', $value) ||
            ! preg_match('/[A-Z]/', $value) ||
            ! preg_match('/[a-z]/', $value) ||
            ! preg_match('/[!@#$%^&*()_+]/', $value)
        ) {
            return false;
        }

        return true;
    }

    /**
     * @throws ISavingsMatePasswordException
     */
    public static function create(string $value): IPassword
    {
        if (! self::validate($value)) {
            throw SavingsMatePasswordException::InvalidPasswordStrength(strlen($value));
        }

        return new self($value);
    }

    /**
     * @throws Exception
     */
    private static function randomString(int $length): string
    {
        $numbers = '0123456789';
        $lowerCase = 'abcdefghijklmnopqrstuvwxyz';
        $upperCase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $specialChars = '!@#$%^&*()_+';

        $chars = $numbers.$lowerCase.$upperCase.$specialChars;

        $charsLength = strlen($chars);
        $randomString = '';

        for ($i = 0; $i <= $length; $i++) {
            $randomString .= $chars[random_int(0, $charsLength - 1)];
        }

        $randomString .= $numbers[random_int(0, $charsLength - 1)];
        $randomString .= $lowerCase[random_int(0, $charsLength - 1)];
        $randomString .= $upperCase[random_int(0, $charsLength - 1)];
        $randomString .= $specialChars[random_int(0, $charsLength - 1)];

        return $randomString;
    }
}
