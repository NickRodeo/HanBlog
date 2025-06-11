<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard/categories/index", [
            "categories" => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard/categories/create");
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|unique:categories,name",
            "slug" => "required|unique:categories,slug"
        ]);

        Category::create($validatedData);
        return redirect(url("dashboard/categories"))->with("success", "New Category Has Been Created");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("dashboard/categories/edit", [
            "category" => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $rules = [];
        if($request->name != $category->name)
            $rules["name"] = "required|unique:categories,name";

        if($request->slug != $category->slug)
            $rules["slug"] = "required|unique:categories,slug";

        $validatedData = $request->validate($rules);
        $category->update($validatedData);

        return redirect(url("dashboard/categories"))->with("success", "Category Has Been Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect(url("dashboard/categories"))->with("success", "Category Has Been Deleted");
    }
}
