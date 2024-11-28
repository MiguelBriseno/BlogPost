<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('posts.index', ['posts' => Post::latest()->paginate(10)]);
    }

    public function create(Post $post): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('posts.create', ['post' => $post]);
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug',
            'body' => 'required'
        ]);

        $post = $request->user()->posts()->create([
            'title' => $request->title,
            'slug' => $request->slug,
            'body' => $request->body
        ]);

        return redirect()->route('posts.index', $post);
    }

    public function edit(Post $post): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug,' . $post->id,
            'body' => 'required'
        ]);

        $post->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'body' => $request->body
        ]);

        return redirect()->route('posts.index', $post);
    }

    public function destroy(Post $post): \Illuminate\Http\RedirectResponse
    {
        $post->delete();

        return back();
    }
}
