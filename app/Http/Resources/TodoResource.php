<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property mixed $user_id
 * @property mixed $title
 * @property mixed $completed
 * @property mixed $id
 */
class TodoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
     #[ArrayShape(['id' => "mixed", 'userId' => "mixed", 'title' => "mixed", 'completed' => "mixed"])] public function toArray(Request $request): array
    {
        return [
            'userId'=>$this->user_id,
            'id'=>$this->id,
            'title'=>$this->title,
            'completed'=>$this->completed,
        ];
    }
}
