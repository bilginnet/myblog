<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index');
    }

    public function show(Post $post)
    {
        $prev = Post::query()->where('id', '<', $post->id)->orderBy('created_at', 'ASC')->max('id');
        $next = Post::query()->where('id', '>', $post->id)->orderBy('created_at', 'DESC')->min('id');

        return view('post.show', [
            'post' => $post,
            'prev' => $prev,
            'next' => $next,
        ]);
    }

    public function rate(Post $post, int $rate): \Illuminate\Http\RedirectResponse
    {
        $post->setRate($rate);
        return back();
    }
}
