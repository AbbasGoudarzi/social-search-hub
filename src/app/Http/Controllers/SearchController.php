<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');

        $posts = Post::search($search)->get();

        return response()->json(['posts' => $posts]);
    }
}
