<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run()
    {
        Car::insert([
            [
                'brand'       => 'Toyota',
                'model'       => 'Camry',
                'year'        => 2022,
                'price'       => 30000,
                'engine_type' => 'бензин',
                'drive_type'  => 'передний',
                'images'      => json_encode(['camry_front.jpg', 'camry_side.jpg']),
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'brand'       => 'Tesla',
                'model'       => 'Model S',
                'year'        => 2021,
                'price'       => 80000,
                'engine_type' => 'электричка',
                'drive_type'  => 'полный',
                'images'      => json_encode(['model_s_front.jpg', 'model_s_side.jpg']),
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'brand'       => 'Ford',
                'model'       => 'Mustang',
                'year'        => 2019,
                'price'       => 55000,
                'engine_type' => 'бензин',
                'drive_type'  => 'задний',
                'images'      => json_encode(['mustang_front.jpg', 'mustang_side.jpg']),
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'brand'       => 'Chevrolet',
                'model'       => 'Bolt EV',
                'year'        => 2020,
                'price'       => 37000,
                'engine_type' => 'электричка',
                'drive_type'  => 'передний',
                'images'      => json_encode(['bolt_front.jpg', 'bolt_side.jpg']),
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'brand'       => 'BMW',
                'model'       => 'X5',
                'year'        => 2023,
                'price'       => 60000,
                'engine_type' => 'гибрид',
                'drive_type'  => 'полный',
                'images'      => json_encode(['x5_front.jpg', 'x5_side.jpg']),
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}
