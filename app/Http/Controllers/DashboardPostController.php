<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard/posts/index", [
            "posts" => Post::where("user_id", "=", Auth::user()->id)->with("category")->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard/posts/create", [
            "categories" => Category::all()
        ]);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "title" => "required|max:155",
            "slug" => "required|unique:posts,slug",
            "image" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "category_id" => "required|min:1", 
            "body" => "required|min:55"
        ]);
        
        $cleanBody = str_replace("<br>", " ", $request->body);
        $cleanBody = strip_tags($cleanBody);
        $cleanBody = str_replace("&nbsp;", "", $cleanBody);

        if($request->file("image"))
            $validatedData["image"] = $request->file('image')->store("post-images");

        $validatedData["excerpt"] = Str::limit($cleanBody, 95, "...");
        $validatedData["user_id"] = Auth::user()->id;

        Post::create($validatedData);
        return redirect(url("dashboard/posts"))->with("success", "New Post Has Been Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("dashboard/posts/show", [
            "post" => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view("dashboard/posts/edit", [
            "categories" => Category::all(),
            "post" => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules =[
            "title" => "required|max:155",
            "category_id" => "required|min:1", 
            "image" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "body" => "required|min:55"
        ];

        if($request->slug != $post->slug)
            $rules["slug"] = "required|unique:posts,slug";

        $validatedData = $request->validate($rules);

        if($request->file("image")){
            if($post->image) Storage::delete($post->image);
            $validatedData["image"] = $request->file('image')->store("post-images");
        }else{
            $validatedData["image"] = $post->image;
        }

        // if(!$request->file("image"))
        //     $validatedData["image"] = $request->image;
        
        $cleanBody = str_replace("<br>", " ", $request->body);
        $cleanBody = strip_tags($cleanBody);
        $cleanBody = str_replace("&nbsp;", "", $cleanBody);

        $validatedData["excerpt"] = Str::limit($cleanBody, 95, "...");
        $validatedData["user_id"] = Auth::user()->id;

        Post::where("id", "=", $post->id)->update($validatedData);
        return redirect(url("dashboard/posts"))->with("success", "Post Has Been Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->image) Storage::delete($post->image);

        Post::destroy($post->id);
        return redirect(url("dashboard/posts"))->with("success", "Post Has Been Deleted");
    }
}
