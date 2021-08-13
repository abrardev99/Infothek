<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with(['category', 'media'])
        ->when($request->q, fn($query, $q) => $query->whereLike(['title', 'excerpt'], $q))
        ->paginate();

        return view('welcome', compact('posts'));
    }

    public function show(Post $post)
    {
        $relatedPosts = Post::select(['id', 'slug', 'title'])->where('category_id', $post->category_id)->get();
        return view('single-post', compact('post', 'relatedPosts'));
    }

    public function categoryPosts(Category $category)
    {
        $posts = $category->posts()->with(['category', 'media'])->paginate();
        return view('welcome', compact('posts', 'category'));
    }
}
