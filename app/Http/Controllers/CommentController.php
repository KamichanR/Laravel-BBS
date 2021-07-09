<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Post $post)
    {
        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->poster = $request->poster;
        $comment->email = $request->email;
        $comment->body = $request->body;
        $comment->save();

        return redirect()
            ->route('posts.read', $post);
    }
}
