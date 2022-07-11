<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'type' => 'post',
            'attributes' => [
                'title' => $this->title,
                'body' => $this->body,
                'description' => $this->description,
                'published' => $this->published,
            ],
            'relationships' => [],
            'links' => [
                'self' => route('api:v1:posts:show', [$this->id,$this->slug])
            ]
        ];
    }
}
