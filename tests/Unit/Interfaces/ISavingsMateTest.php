<?php

declare(strict_types=1);

test('Deve conter somente interfaces no namespace')
    ->todo()
    ->expect('SavingsMate')
    ->interfaces()
    ->and('SavingsMate\Interfaces')
    ->toHavePrefix('I');

test('Toda Interface deve iniciar com a letra I')
    ->expect('SavingsMate\Interfaces')
    ->toHavePrefix('I');
