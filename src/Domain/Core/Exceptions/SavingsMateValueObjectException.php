<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core\Exceptions;

use SavingsMate\Interfaces\Domain\Core\Exceptions\ISavingsMateValueObjectException;

final class SavingsMateValueObjectException extends \SavingsMate\Domain\Exceptions\SavingsMateException implements ISavingsMateValueObjectException
{
}
