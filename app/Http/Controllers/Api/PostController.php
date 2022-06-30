<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['tags', 'category'])->orderByDesc('id')->paginate(9);

        return $posts;
    }

    public function show($slug)
    {
        $post = Post::where(['tags', 'category'])->where('slug', $slug)->first();

        return $post;
    }
}
