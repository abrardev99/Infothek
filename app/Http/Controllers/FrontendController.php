<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'media'])->paginate();
        return view('welcome', compact('posts'));
    }

    public function show(Post $post)
    {
        $relatedPosts = Post::select(['id', 'slug', 'title'])->where('category_id', $post->category_id)->get();
        return view('single-post', compact('post', 'relatedPosts'));
    }
}
