<?php

declare(strict_types=1);

test('Toda classe DTO deve conter o sufixo Dtos')
    ->expect('SavingsMate\Domain\Transaction\Dtos')
    ->toHaveSuffix('Dto');

test('Toda classe DTO deve implementar a interface IDto')
    ->expect('SavingsMate\Domain\Transaction\Dtos')
    ->toImplement(SavingsMate\Interfaces\Domain\Core\IDto::class);
