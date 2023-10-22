<?php

declare(strict_types=1);

use SavingsMate\Domain\Core\Exceptions\SavingsMatePasswordException;
use SavingsMate\Domain\Core\ValueObjects\Password;
use SavingsMate\Interfaces\Domain\Core\ValueObjects\IPassword;

test('Deve retornar true quando senha informada for forte')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(Password::validate('Abc123!@#'))->toBeTrue();

test('Deve retornar false quando senha informada for fraca')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(Password::validate('abc123'))->toBeFalse();

test('Deve criar uma nova instancia de Password quando a senha informada for forte')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(Password::create('Abc123!@#'))->toBeInstanceOf(IPassword::class);

test('Deve lancar uma excecao quando tentar criar uma instancia de Password com a senha fraca')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->throws(SavingsMatePasswordException::class)
    ->expect(fn () => Password::create('12345678'));

test('Deve retornar true quando a senha informada for igual a senha da instancia')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(Password::create('Abc123!@#')->equals(Password::create('Abc123!@#')))->toBeTrue();

test('Deve retornar false quando a senha informada for diferente da senha da instancia')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(Password::create('Abc12$@$#3')->equals(Password::create('Abc123!@#')))->toBeFalse();

test('Deve criar uma nova instancia de Password com senha aleatoria valida')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(Password::random())->toBeInstanceOf(IPassword::class)
    ->and(Password::validate(Password::random()->getValue()))->toBeTrue();

test('Deve criar uma nova instancia de Password com senha aleatoria valida com tamanho informado')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(Password::random(10))->toBeInstanceOf(IPassword::class);

test('Deve lancar uma excecao quando tentar criar uma instancia de Password com tamanho menor que o minimo')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->throws(SavingsMatePasswordException::class)
    ->expect(fn () => Password::random(7));

test('Deve retornar a senha criptografada')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(Password::create('Abc123!@#')->hash('salt'))->toBeString()
    ->and(strlen(Password::create('Abc123!@#')->hash('salt')))->toBeGreaterThan(10)
    ->and(Password::create(Password::create('Abc123!@#')->hash('salt'))->equals(Password::create('Abc123!@#')))->toBeFalse();

test('Deve gerar um novo salt aleatorio')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(Password::generateSalt())->toBeString()
    ->and(strlen(Password::generateSalt()))->toBeGreaterThan(10)
    ->and(Password::generateSalt())->not()->toBe(Password::generateSalt());

test('Deve retornar true quando a senha informada for igual a senha criptografada', function () {
    $salt = Password::generateSalt();
    $password = Password::create('Abc123!@#');
    $hash = $password->hash($salt);

    expect(Password::match($password->getValue(), $hash, $salt))->toBeTrue();
})
    ->todo()
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit');
