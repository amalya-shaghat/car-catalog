<?php

namespace App\Enums;

enum EngineType: string
{
    case BENZIN = 'бензин';
    case DIESEL = 'дизель';
    case HYBRID = 'гибрид';
    case ELECTRIC = 'электричка';
}
