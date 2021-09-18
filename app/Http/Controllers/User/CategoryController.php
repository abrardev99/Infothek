<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController
{

    public function index() : View
    {
        return view('user.category.index');
    }

    public function create() : View
    {
        $categories = Category::all();

        return view('user.category.create', compact('categories'));
    }

    public function store(CategoryStoreRequest $request)
    {
        auth()->user()->categories()->create($request->validated());
        session()->flash('success', 'Category created successfully.');

        switch ($request->from) {
            case 'save':
                return redirect()->route('category.index');
                break;

            case 'save_and_create_new':
                return redirect()->route('category.create');
                break;

            default:
                return redirect()->route('category.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit(Category $category) : View
    {
        $categories = Category::all();

        return view('user.category.edit', compact('categories', 'category'));
    }

    public function update(CategoryStoreRequest $request, Category $category)
    {
        $category->update($request->validated());
        session()->flash('success', 'Category updated successfully.');

        switch ($request->from) {
            case 'save':
                return redirect()->route('category.index');
                break;

            case 'save_and_create_new':
                return redirect()->route('category.create');
                break;

            default:
                return redirect()->route('category.index');
        }
    }
}
