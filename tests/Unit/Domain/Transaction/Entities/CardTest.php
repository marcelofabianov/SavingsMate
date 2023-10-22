<?php

declare(strict_types=1);

use function Pest\Faker\fake;

use SavingsMate\Domain\Core\ValueObjects\CreatedAt;
use SavingsMate\Domain\Core\ValueObjects\DeletedAt;
use SavingsMate\Domain\Core\ValueObjects\InactivatedAt;
use SavingsMate\Domain\Core\ValueObjects\UpdatedAt;
use SavingsMate\Domain\Core\ValueObjects\Uuid;
use SavingsMate\Domain\Transaction\Entities\Card;
use SavingsMate\Interfaces\Domain\Transaction\Entities\ICard;

test('Deve criar uma nova instancia de Card com todos os parametros validos', function () {
    $data = [
        'id' => Uuid::random(),
        'name' => fake()->company(),
        'main' => fake()->boolean(),
        'inactivatedAt' => InactivatedAt::random(),
        'deletedAt' => DeletedAt::random(),
        'createdAt' => CreatedAt::random(),
        'updatedAt' => UpdatedAt::random(),
    ];

    $card = Card::create(
        $data['name'],
        $data['main'],
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
        'inactivatedAt' => $data['inactivatedAt']->toString(),
        'deletedAt' => $data['deletedAt']->toString(),
        'createdAt' => $data['createdAt']->toString(),
        'updatedAt' => $data['updatedAt']->toString(),
    ];

    expect($card)->toBeInstanceOf(ICard::class)
        ->and($card->toArray())->toEqual($expectedToArray);
})
    ->group('Unit', 'Entity', 'Transaction', 'Domain', 'Card');

test('Deve criar uma nova instancia de Card com os parametros obrigatorios', function () {
    $card = Card::create(fake()->company());

    expect($card)->toBeInstanceOf(ICard::class)
        ->and($card->toArray())->toHaveKeys(['id', 'name', 'main', 'inactivatedAt', 'deletedAt', 'createdAt', 'updatedAt']);
})
    ->group('Unit', 'Entity', 'Transaction', 'Domain', 'Card');
