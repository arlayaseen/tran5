<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/',[PostController::class, 'index'])->name('posts.index');
// Route::get('/posts',[PostController::class, 'index'])->name('posts.index');
Route::get('/dashboard',[PostController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::group(['prefix' => 'posts','middleware'=>'auth'],function(){
    Route::get('/create',[PostController::class, 'create'])->name('posts.create');
    Route::post('/',[PostController::class, 'store'])->name('posts.store');
    Route::get('/edit/{id}',[PostController::class, 'edit'])->name('posts.edit');
    Route::put('/{id}',[PostController::class, 'update'])->name('posts.update');
    Route::delete('/{id}',[PostController::class, 'destroy'])->name('posts.delete');
});



Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
