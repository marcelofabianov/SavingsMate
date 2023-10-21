<?php

declare(strict_types=1);

test('Nao deve conter chamadas de funcoes globais de debug')
    ->expect(['dd', 'dump'])
    ->not->toBeUsed();

test('Toda Interface deve iniciar a letra I')
    ->expect('SavingsMate\Interfaces')
    ->toHavePrefix('I');

test('Todo arquivo deve ter strict types')
    ->expect('SavingsMate')
    ->toUseStrictTypes();

test('Deve conter somente interfaces no namespace')
    ->todo()
    ->expect('SavingsMate')
    ->interfaces()
    ->toExtend('SavingsMate\Interfaces');
