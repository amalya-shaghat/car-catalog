<?php

namespace App\Enums;

enum DriveType: string
{
    case FRONT = 'передний';
    case REAR = 'задний';
    case ALL_WHEEL = 'полный';
}
