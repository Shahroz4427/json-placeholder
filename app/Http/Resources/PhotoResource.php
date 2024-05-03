<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property mixed $album_id
 * @property mixed $title
 * @property mixed $id
 * @property mixed $url
 * @property mixed $thumbnail_url
 */
class PhotoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['albumId' => "mixed", 'id' => "mixed", 'title' => "mixed", 'url' => "mixed", 'thumbnailUrl' => "mixed"])] public function toArray(Request $request): array
    {
        return [
            'albumId'=>$this->album_id,
            'id'=>$this->id,
            'title'=>$this->title,
            'url'=>$this->url,
            'thumbnailUrl'=>$this->thumbnail_url
        ];
    }
}
