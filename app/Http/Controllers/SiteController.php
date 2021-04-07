<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $posts = Post::with('media')->simplePaginate(2);

        return view('index', compact('posts'));
    }

    public function post(Post $post)
    {
        return view('post', compact('post'));
    }
}
