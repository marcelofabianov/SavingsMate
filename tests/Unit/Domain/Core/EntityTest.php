<?php

declare(strict_types=1);

test('Classe de Entidade devem implementar a interface IEntity')
    ->expect('SavingsMate\Domain\Core\Entities')
    ->toImplement(SavingsMate\Interfaces\Domain\Core\IEntity::class)
    ->and('SavingsMate\Domain\Transaction\Entities')
    ->toImplement(SavingsMate\Interfaces\Domain\Core\IEntity::class);

test('Classes de Entidade devem extender a classe Entity')
    ->expect('SavingsMate\Domain\Core\Entities')
    ->toExtend(SavingsMate\Domain\Core\Entity::class)
    ->and('SavingsMate\Domain\Transaction\Entities')
    ->toExtend(SavingsMate\Domain\Core\Entity::class);

test('Classe Entity deve ser abstrata')
    ->expect(SavingsMate\Domain\Core\Entity::class)
    ->toBeAbstract();

test('Classe Entity deve ser o metodo __toString()')
    ->expect(SavingsMate\Domain\Core\Entity::class)
    ->toHaveMethod('__toString');

test('Classes de Entidades devem implementar o metodo __toString()')
    ->expect('SavingsMate\Domain\Core\Entities')
    ->toHaveMethod('__toString')
    ->and('SavingsMate\Domain\Transaction\Entities')
    ->toHaveMethod('__toString');

test('Classes de Entidades devem ser final')
    ->expect('SavingsMate\Domain\Core\Entities')
    ->toBeFinal()
    ->and('SavingsMate\Domain\Transaction\Entities')
    ->toBeFinal();

test('Classes de Entidades devem ser readonly')
    ->expect('SavingsMate\Domain\Core\Entities')
    ->toBeReadonly()
    ->and('SavingsMate\Domain\Transaction\Entities')
    ->toBeReadonly();

test('Classes de Entidades devem ter um construtor')
    ->expect('SavingsMate\Domain\Core\Entities')
    ->toHaveConstructor()
    ->and('SavingsMate\Domain\Transaction\Entities')
    ->toHaveConstructor();

test('Classes de Entidades devem ter o metodo create estativo para criar uma nova instancia')
    ->expect('SavingsMate\Domain\Core\Entities')
    ->toHaveMethod('create')
    ->and('SavingsMate\Domain\Transaction\Entities')
    ->toHaveMethod('create');

test('Classes de Entidades devem ter o metodo toArray')
    ->expect('SavingsMate\Domain\Core\Entities')
    ->toHaveMethod('toArray')
    ->and('SavingsMate\Domain\Transaction\Entities')
    ->toHaveMethod('toArray');

test('Classes de Entidades devem ter o metodo toJson')
    ->expect('SavingsMate\Domain\Core\Entities')
    ->toHaveMethod('toJson')
    ->and('SavingsMate\Domain\Transaction\Entities')
    ->toHaveMethod('toJson');
