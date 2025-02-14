<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');

        $posts = NewsPost::search($search)->get();

        return response()->json(['posts' => $posts]);
    }
}
