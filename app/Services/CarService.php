<?php

namespace App\Services;

use App\Models\Car;

class CarService
{
    public function getFilteredCars(array $filters)
    {
        $query = Car::query();

        if (!empty($filters['brand'])) {
            $query->where('brand', $filters['brand']);
        }

        if (!empty($filters['engine_type'])) {
            $query->where('engine_type', $filters['engine_type']);
        }

        if (!empty($filters['drive_type'])) {
            $query->where('drive_type', $filters['drive_type']);
        }

        if (!empty($filters['year_min']) || !empty($filters['year_max'])) {
            $yearMin = $filters['year_min'] ?? 1900;
            $yearMax = $filters['year_max'] ?? date('Y');
            $query->whereBetween('year', [$yearMin, $yearMax]);
        }

        if (!empty($filters['price_min']) || !empty($filters['price_max'])) {
            $priceMin = $filters['price_min'] ?? 0;
            $priceMax = $filters['price_max'] ?? 99999999;
            $query->whereBetween('price', [$priceMin, $priceMax]);
        }

        $perPage = $filters['per_page'] ?? 10;

        return $query->paginate($perPage);
    }
}
