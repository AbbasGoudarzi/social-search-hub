<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'platform' => $this->platform,
            'published_at' => $this->published_at,
            'content' => $this->content,
            'source' => $this->source,
            'url' => $this->url,
            'extra_data' => $this->extra_data,
        ];
    }
}
