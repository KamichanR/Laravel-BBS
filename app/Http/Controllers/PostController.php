<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return view('index')
            ->with(['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->poster = $request->poster;
        $post->email = $request->email;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()
            ->route('index');
    }

    public function read(Post $post)
    {
        return view('posts.read')
            ->with(['post' => $post]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit')
            ->with(['post' => $post]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->poster = $request->poster;
        $post->email = $request->email;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()
            ->route('posts.read', $post);
    }

    public function destory(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('index');
    }
}
