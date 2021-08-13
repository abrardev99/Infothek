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
}
