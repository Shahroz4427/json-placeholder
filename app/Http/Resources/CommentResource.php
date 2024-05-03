<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property mixed $post_id
 * @property mixed $name
 * @property mixed $email
 * @property mixed $body
 * @property mixed $id
 */
class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['postId' => "mixed", 'id' => "mixed", 'name' => "mixed", 'email' => "mixed", 'body' => "mixed"])] public function toArray(Request $request): array
    {
        return [
            'postId' => $this->post_id,
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'body' => $this->body
        ];
    }
}
