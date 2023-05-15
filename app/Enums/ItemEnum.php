<?php

namespace App\Enums;

enum ItemEnum: string
{
    case Metr = 'м';
    case MetrSquare = 'м2';
    case MetrCubic = 'м3';
    case Piece = 'шт';
    case Nothing = '-';
}
