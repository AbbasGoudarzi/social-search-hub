<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class NewsPost extends Model
{
    use HasFactory, Searchable;

    protected $guarded = [];

    public function toSearchableArray(): array
    {
        return [
            'published_at' => $this->published_at,
            'title' => $this->title,
            'content' => $this->content,
            'source' => $this->source,
        ];
    }
}
