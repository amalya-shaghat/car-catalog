<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarFilterRequest;
use App\Http\Resources\CarResource;
use App\Services\CarService;

class CarController extends Controller
{
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function index(CarFilterRequest $request)
    {
        $cars = $this->carService->getFilteredCars($request->filters());

        return CarResource::collection($cars);
    }
}
