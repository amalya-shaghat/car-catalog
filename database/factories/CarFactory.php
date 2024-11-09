<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\EngineType;
use App\Enums\DriveType;

class CarFactory extends Factory
{
    protected $model = Car::class;

    /**
     * @return array|mixed[]
     */
    public function definition(): array
    {
        $brands = [
            'Toyota' => ['Camry', 'Corolla', 'Prius', 'Highlander'],
            'Honda' => ['Civic', 'Accord', 'CR-V', 'Pilot'],
            'Ford' => ['F-150', 'Mustang', 'Explorer', 'Escape'],
            'Chevrolet' => ['Impala', 'Silverado', 'Tahoe', 'Malibu'],
            'BMW' => ['3 Series', '5 Series', 'X5', 'X3'],
            'Audi' => ['A4', 'A6', 'Q5', 'Q7'],
            'Mercedes' => ['C-Class', 'CLS', 'E-Class', 'S-Class', 'GLA', 'GLC', 'GLE'],
        ];

        $images = [
            'camry_front.jpg',
            'camry_side.jpg',
            'cls_front.jpg',
            'cls_side.jpg',
            'model_s_front.jpg',
            'model_s_side.jpg',
            'mustang_front.jpg',
            'mustang_side.jpg',
            'volt_front.jpg',
            'volt_side.jpg',
            'x5_front.jpg',
            'x5_side.jpg',
        ];

        $brand = $this->faker->randomElement(array_keys($brands));
        $model = $this->faker->randomElement($brands[$brand]);
        $selectedImages = $this->faker->randomElements($images, rand(1, 2));

        return [
            'brand' => $brand,
            'model' => $model,
            'year' => $this->faker->numberBetween(2000, 2023),
            'price' => $this->faker->randomFloat(2, 1000, 100000),
            'engine_type' => $this->faker->randomElement(EngineType::cases())->value,
            'drive_type' => $this->faker->randomElement(DriveType::cases())->value,
            'images' => $selectedImages
        ];
    }
}
