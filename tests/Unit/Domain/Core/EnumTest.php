<?php

declare(strict_types=1);

test('Todo Enum deve conter o sufixo Enum')
    ->expect('SavingsMate\Domain\Transaction\Enums')
    ->toHaveSuffix('Enum');
