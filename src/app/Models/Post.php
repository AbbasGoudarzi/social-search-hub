<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory, Searchable;

    protected $guarded = [];

    const PLATFORMS = ['news', 'instagram', 'twitter'];

    protected $casts = [
        'extra_data' => 'array'
    ];

    public function toSearchableArray(): array
    {
        return [
            'published_at' => $this->published_at,
            'content' => $this->content,
            'source' => $this->source,
        ];
    }
}
