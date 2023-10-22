<?php

declare(strict_types=1);

use function Pest\Faker\fake;

use SavingsMate\Domain\Core\ValueObjects\CreatedAt;
use SavingsMate\Domain\Core\ValueObjects\DeletedAt;
use SavingsMate\Domain\Core\ValueObjects\InactivatedAt;
use SavingsMate\Domain\Core\ValueObjects\UpdatedAt;
use SavingsMate\Domain\Core\ValueObjects\Uuid;
use SavingsMate\Domain\Transaction\Entities\BankAccount;
use SavingsMate\Interfaces\Domain\Transaction\Entities\IBankAccount;

test('Deve criar uma nova instancia com todos os parametros validos', function () {
    $data = [
        'name' => fake()->company(),
        'main' => fake()->boolean(),
        'description' => fake()->text(),
        'id' => Uuid::random(),
        'inactivatedAt' => InactivatedAt::random(),
        'deletedAt' => DeletedAt::random(),
        'createdAt' => CreatedAt::random(),
        'updatedAt' => UpdatedAt::random(),
    ];

    $bankAccount = BankAccount::create(
        $data['name'],
        $data['main'],
        $data['description'],
        $data['id'],
        $data['inactivatedAt'],
        $data['deletedAt'],
        $data['createdAt'],
        $data['updatedAt']
    );

    $expectedToArray = [
        'id' => $data['id']->toString(),
        'name' => $data['name'],
        'main' => $data['main'],
        'description' => $data['description'],
        'inactivatedAt' => $data['inactivatedAt']->toString(),
        'deletedAt' => $data['deletedAt']->toString(),
        'createdAt' => $data['createdAt']->toString(),
        'updatedAt' => $data['updatedAt']->toString(),
    ];

    expect($bankAccount)->toBeInstanceOf(IBankAccount::class)
        ->and($expectedToArray)->toEqual($bankAccount->toArray());
})
    ->group('Unit', 'Entity', 'Transaction', 'Domain', 'BankAccount');

test('Deve criar uma nova instancia de BankAccount somente com informacoes obrigatorias', function () {
    $bankAccount = BankAccount::create(fake()->company());

    expect($bankAccount)->toBeInstanceOf(IBankAccount::class)
        ->and($bankAccount->toArray())->toHaveKeys(['id', 'name', 'description', 'inactivatedAt', 'deletedAt', 'createdAt', 'updatedAt']);
})
    ->group('Unit', 'Entity', 'Transaction', 'Domain', 'BankAccount');
