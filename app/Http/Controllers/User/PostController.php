<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController
{
    public function index()
    {
        return view('user.post.index');
    }

    public function create()
    {
        $categories = Category::whereNull('category_id')
            ->with('childCategories')
            ->get();
        return view('user.post.create', compact('categories'));
    }

    public function store(StorePostRequest $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    public function tinymceImageStore(Request $request)
    {
        try {
            $path = $request->file('file')->store('tinymce', 'public');
            return response()->json(['location' => $path], 200);
        }catch (\Exception $e){
            return response()->json(['location' => null], 500);
        }

    }
}
