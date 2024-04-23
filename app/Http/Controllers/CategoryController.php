<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->title = $request->title;

        $newName = uniqid() . "_" . $request->file('cover_image')->getClientOriginalName();
        $request->file('cover_image')->storeAs('public', $newName);

        $category->cover_image = $newName;
        $category->save();

        return redirect()->route("category.index")->with("message", "New Category Added Successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact("category"));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->title = $request->title;
        if ($request->hasFile('cover_image')) {
            $newName = uniqid() . "_" . $request->file('cover_image')->getClientOriginalName();
            $request->file('cover_image')->storeAs('public', $newName);
            $category->cover_image = $newName;
            if ($request->cover_old_image != "default_image.svg") {
                Storage::delete("public/" . $request->cover_old_image);
            }
        } else {
            $category->cover_image = $request->cover_old_image;
        }
        $category->update();

        return redirect()->route('category.index')->with("message", "Updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->cover_image != "default_image.svg") {
            Storage::delete("public/" . $category->cover_image);
        }
        $category->delete();
        return redirect()->back();
    }
}
