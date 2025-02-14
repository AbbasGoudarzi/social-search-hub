<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(SearchRequest $request)
    {
        $query = $request->get('query');
        $source = $request->get('source');
        $fromDate = $request->get('from_date');
        $toDate = $request->get('to_date', now()->format('Y-m-d H:i:s'));
        $perPage = $request->get('per_page', 10);

        $posts = Post::search($query)
            ->query(function (Builder $query) use ($source, $toDate, $fromDate) {
                $query
                    ->when($source, function (Builder $q) use ($source) {
                        $q->where('source', $source);
                    })
                    ->when($fromDate, function (Builder $q) use ($toDate, $fromDate) {
                        $q->whereBetween('published_at', [$fromDate, $toDate]);
                    });
            })
            ->paginate($perPage);

        return PostResource::collection($posts);
    }
}
