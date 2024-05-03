<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property mixed $street
 * @property mixed $suite
 * @property mixed $city
 * @property mixed $zipcode
 */
class CustomerAddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['street' => "mixed", 'suite' => "mixed", 'city' => "mixed", 'zipcode' => "mixed", 'geo' => "\App\Http\Resources\CustomerGeoResource"])] public function toArray(Request $request): array
    {
        return [
            'street' => $this->street,
            'suite' => $this->suite,
            'city' => $this->city,
            'zipcode' => $this->zipcode,
            'geo' => new CustomerGeoResource($this->whenLoaded('geo'))
        ];
    }
}
