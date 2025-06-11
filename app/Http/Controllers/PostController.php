<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "All Posts";
        if($request->category) $title = Category::where('slug', '=', $request->category)->first()->name;
        else if($request->author) $title = "Posts By : " . User::where('slug', '=', $request->author)->first()->name;
        return view('posts/index', [
                    "title" => $title, 
                    "posts" => Post::with(["category", "author"])->filters(request(["search", "category", "author"]))
                               ->Latest()->paginate(6)->withQueryString(),
                    "postsCarousel" => Post::latest()->limit(11)->get()
                    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $post = Post::where('slug', '=', $slug)->with(["category", "author"])->first();
        if(!$post)
            return redirect(url("/posts"));

        return view("posts/show", ["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
