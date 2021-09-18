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
        ->when($request->q, function($query, $q) {
            $query->whereLike(['title', 'excerpt', 'category.name'], $q);
        })
        ->paginate();

        $categories = Category::with('childCategories')
            ->whereNotNull('category_id')
            ->get();

        return view('welcome', compact('posts', 'categories'));
    }

    public function show(Post $post)
    {
        $relatedPosts = Post::select(['id', 'slug', 'title'])->where('category_id', $post->category_id)->get();
        return view('single-post', compact('post', 'relatedPosts'));
    }

    public function categoryPosts(Category $category)
    {
        $categories = Category::with('childCategories')
            ->whereCategoryId($category->id)
            ->get();

        $posts = $category->posts()->with(['category', 'media'])->paginate();
        return view('welcome', compact('posts', 'category', 'categories'));
    }
}
