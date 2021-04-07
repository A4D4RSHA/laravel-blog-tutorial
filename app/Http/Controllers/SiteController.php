<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
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

    public function category(Category $category)
    {
        $posts = $category->posts()->with('media')->paginate(3);

        return view('index', compact('posts'));
    }

    public function search(Request $request)
    {
        if (empty($request->search))
            return redirect('/');

        $search = strip_tags($request->search);

        $posts = Post::where('title', 'LIKE', "%$search%")
            ->with('media')
            ->paginate(3);

        return view('index', compact('posts'));
    }
}
