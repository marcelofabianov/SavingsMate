<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Exceptions;

use Exception;
use SavingsMate\Interfaces\Exceptions\ISavingsMateException;

class SavingsMateException extends Exception implements ISavingsMateException
{
}
