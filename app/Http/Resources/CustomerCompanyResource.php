<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property mixed $name
 * @property mixed $catch_phrase
 * @property mixed $bs
 */
class CustomerCompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['name' => "mixed", 'catchPhrase' => "mixed", 'bs' => "mixed"])] public function toArray(Request $request): array
    {
        return [
            'name'=>$this->name,
            'catchPhrase'=>$this->catch_phrase,
            'bs'=>$this->bs
        ];
    }
}
