<?php

namespace App\Http\Requests;

use App\Enums\EngineType;
use App\Enums\DriveType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CarFilterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'brand' => 'nullable|string',
            'engine_type' => ['nullable', new Enum(EngineType::class)],
            'drive_type' => ['nullable', new Enum(DriveType::class)],

            'year_min' => ['nullable', 'bail', 'integer', 'min:1900'],
            'year_max' => ['nullable', 'bail', 'integer', 'min:1900'],

            'price_min' => 'nullable|numeric|min:1000|max:100000',
            'price_max' => 'nullable|numeric|min:1000|max:100000',

            'per_page' => 'nullable|integer|min:1',
            'page' => 'nullable|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'year_min.integer' => 'The minimum year must be an integer.',
            'year_max.integer' => 'The maximum year must be an integer.',
            'price_min.numeric' => 'The minimum price must be a number.',
            'price_max.numeric' => 'The maximum price must be a number.',
        ];
    }

    public function filters(): array
    {
        return $this->only([
            'brand',
            'engine_type',
            'drive_type',
            'year_min',
            'year_max',
            'price_min',
            'price_max',
            'per_page',
            'page',
        ]);
    }
}
