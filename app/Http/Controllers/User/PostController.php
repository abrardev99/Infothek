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
        $post = auth()->user()->posts()->create($request->only([
            'title', 'excerpt', 'category_id', 'content'
        ]));

        $post->addMedia(storage_path('app/' . $request->thumbnail))->toMediaCollection('thumbnails');

        if ($request->has('attachments')) {
            collect($request->attachments)->each(function ($attachment) use ($post) {
                $post->addMedia(storage_path('app/' . $attachment))->toMediaCollection('attachments');
            });
        }

        session()->flash('success', 'Post created successfully.');

        switch ($request->from) {
            case 'save':
                return redirect()->route('post.index');
                break;

            case 'save_and_create_new':
                return redirect()->route('post.create');
                break;

            default:
                return redirect()->route('post.index');
        }

    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        $categories = Category::whereNull('category_id')
            ->with('childCategories')
            ->get();

        return view('user.post.edit', compact('post', 'categories'));
    }

    public function update(StorePostRequest $request, Post $post)
    {
        $post->update($request->only([
            'title', 'excerpt', 'category_id', 'content'
        ]));

        if ($request->has('thumbnail')) {
            $post->clearMediaCollection('thumbnails');
            $post->addMedia(storage_path('app/' . $request->thumbnail))->toMediaCollection('thumbnails');
        }

        if ($request->has('attachments')) {
            collect($request->attachments)->each(function ($attachment) use ($post) {
                $post->addMedia(storage_path('app/' . $attachment))->toMediaCollection('attachments');
            });
        }

        session()->flash('success', 'Post updatd successfully.');

        switch ($request->from) {
            case 'save':
                return redirect()->route('post.index');
                break;

            case 'save_and_create_new':
                return redirect()->route('post.create');
                break;

            default:
                return redirect()->route('post.index');
        }
    }

    public function tinymceImageStore(Request $request)
    {
        try {
            $path = $request->file('file')->store('tinymce', 'public');
            return response()->json(['location' => $path], 200);
        } catch (\Exception $e) {
            return response()->json(['location' => null], 500);
        }

    }
}
