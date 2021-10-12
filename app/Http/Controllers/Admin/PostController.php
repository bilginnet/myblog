<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.post.index');
    }

    public function create()
    {
        return view('admin.post.create', [
            'post' => new Post()
        ]);
    }

    public function edit(Post $post)
    {
        return view('admin.post.edit', [
            'post' => $post
        ]);
    }
}
