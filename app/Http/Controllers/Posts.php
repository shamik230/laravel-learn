<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\Save as PostRequest;
use App\Models\Post;

class Posts extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = config('posts.categories');
        return view('posts.create', ['items' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->validated());

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = config('posts.categories');
        $category = $categories[$post->category];
        return view('posts.show', compact('post', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = config('posts.categories');
        return view('posts.edit', ['post' => $post, 'items'=> $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->validated());
        $categories = config('posts.categories');
        $category = $categories[$post->category];
        return view('posts.show', compact('post', 'category'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
