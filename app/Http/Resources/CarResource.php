<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'brand'       => $this->brand,
            'model'       => $this->model,
            'year'        => $this->year,
            'price'       => $this->price,
            'engine_type' => $this->engine_type->value,
            'drive_type'  => $this->drive_type->value,
            'images'      => $this->images,
        ];
    }
}
