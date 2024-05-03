<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property mixed $user_id
 * @property mixed $id
 * @property mixed $title
 * @property mixed $body
 */
class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['userId' => "mixed", 'id' => "mixed", 'title' => "mixed", 'body' => "mixed"])] public function toArray(Request $request): array
    {
        return [
            'userId' => $this->user_id,
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
        ];
    }
}
