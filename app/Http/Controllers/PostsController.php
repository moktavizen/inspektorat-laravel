<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('posts', [
            'posts' => Post::orderBy('updated_at', 'desc')
                ->paginate(9)
        ]);
    }
}
