<?php

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardCategoriesController;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/posts', [PostController::class, "index"]);
Route::get('/posts/{slug}', [PostController::class, "show"]);
Route::get('/categories', function(){
    return view('categories', ["categories" => Category::withCount("posts")->get()]);
});

Route::get('/register', [RegisterController::class, "index"])->middleware("guest");
Route::post('/register', [RegisterController::class, "register"])->middleware("guest");

Route::get('/login', [LoginController::class, "index"])->middleware("guest");
Route::post('/login', [LoginController::class, "login"])->middleware("guest")->name("login");
Route::get('/logout', [LoginController::class, "logout"])->middleware("auth");
Route::post('/logout', [LoginController::class, "logout"])->middleware("auth");

Route::get("/dashboard", function(){
    return view("dashboard/index", [
        "posts" => Post::with(["author", "category"])->get()
    ]);
})->middleware("auth");

Route::get("/dashboard/posts/checkSlug", [DashboardPostController::class, "checkSlug"])->middleware("auth");
Route::resource("/dashboard/posts", DashboardPostController::class)->middleware("auth");

Route::get("/dashboard/categories/checkSlug", [DashboardCategoriesController::class, "checkSlug"])->middleware("admin");
Route::resource("/dashboard/categories", DashboardCategoriesController::class)->except("show")->middleware("admin");









