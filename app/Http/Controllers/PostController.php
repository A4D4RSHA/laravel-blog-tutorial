<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('media')->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required'],
            'body' => ['required'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,gif'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['exists:categories,id'],
        ]);

        if (!empty($request->file('image'))) {
            $media_id = MediaService::upload($request->file('image'), "posts");
        }

        $post = Post::create([
            'title' => $request->title,
            'body' => clean($request->body),
            'user_id' => auth()->user()->id,
            'media_id' => $media_id ?? null,
        ]);

        $post->categories()->sync($request->categories);

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $post_cat = $post->categories->pluck('id')->toArray();

        return view('posts.edit', compact('post', 'categories', 'post_cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => ['required'],
            'body' => ['required'],
            'image' => ['nullable', 'image', 'mimes:png,jpeg,gif'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['exists:categories,id'],
        ]);

        if (!empty($request->file('image'))) {
            if ($post->media_id) {
                Storage::delete('public/' . $post->media->path);
            }

            $media_id = MediaService::upload($request->file('image'), "posts");
        }

        $post->update([
            'title' => $request->title,
            'body' => clean($request->body),
            'user_id' => auth()->user()->id,
            'media_id' => $media_id ?? $post->media_id,
        ]);

        $post->categories()->sync($request->categories);

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->media_id) {
            Storage::delete('public/' . $post->media->path);
        }

        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully!');
    }
}
