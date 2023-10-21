<?php

declare(strict_types=1);

test('Nao deve ser chamado funcoes globais de debug')
    ->expect(['dd', 'dump', 'print', 'print_r', 'var_dump', 'ds'])
    ->not->toBeUsed();

test('Toda Interface deve iniciar com a letra I')
    ->expect('SavingsMate\Interfaces')
    ->toHavePrefix('I');

test('Todo arquivo deve ter conter strict types ativo')
    ->expect('SavingsMate')
    ->toUseStrictTypes();

test('Deve conter somente interfaces no namespace')
    ->todo()
    ->expect('SavingsMate')
    ->interfaces()
    ->toExtend('SavingsMate\Interfaces');
