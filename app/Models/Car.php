<?php

namespace App\Models;

use App\Enums\DriveType;
use App\Enums\EngineType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'year',
        'price',
        'engine_type',
        'drive_type',
        'images',
    ];

    protected $casts = [
        'engine_type' => EngineType::class,
        'drive_type'  => DriveType::class,
        'images'      => 'array',
    ];
}
