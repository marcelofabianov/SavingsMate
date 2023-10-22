<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Enums;

enum CategoryColorEnum: string
{
    case RED = '#FF0000';
    case GREEN = '#00FF00';
    case BLUE = '#0000FF';
    case YELLOW = '#FFFF00';
    case PURPLE = '#800080';
    case ORANGE = '#FFA500';
    case GRAY = '#808080';
}
