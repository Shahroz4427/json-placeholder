<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property mixed $lat
 * @property mixed $lng
 */
class CustomerGeoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['lat' => "mixed", 'lng' => "mixed"])] public function toArray(Request $request): array
    {
        return [
            'lat'=>$this->lat,
            'lng'=>$this->lng
        ];
    }
}
