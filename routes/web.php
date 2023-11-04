<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {

    // $categories = Category::root()->get();
    // $categories = Category::with('children.children.children')->root()->get();

    $categories = Category::tree()->get()->toTree();

    // dd($categories);

    return view('welcome', ['categories' => $categories]);
});


Route::resource('categories', CategoryController::class);


Route::get('/item/{id}', [CategoryController::class, 'getCategoryItem'])->name('item');
Route::get('/topic/{id}', [CategoryController::class, 'getTopic'])->name('topic');
Route::get('/detail/{id}', [CategoryController::class, 'getDetail'])->name('detail');
