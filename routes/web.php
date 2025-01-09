<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\UserRoleController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/change_language', function (Request $request) {
    $lang = $request->query('lang', config('app.locale')); // Default to the app's locale
    session(['locale' => $lang]); // Store the selected language in the session
    return back(); // Redirect back to the previous page
})->name('change_language');

// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']

//     ],
//     function () {
        Route::get('/', [PostController::class, 'index'])->name('posts.index');

        Route::get('/users', [UserRoleController::class, 'index']);

        Route::get('/users/{user}/assign-roles', [UserRoleController::class, 'showAssignRolesForm'])->name('users.assign-roles');
        Route::post('/users/{user}/assign-roles', [UserRoleController::class, 'assignRoles'])->name('users.assign-roles.post');


        // Route::get('/posts',[PostController::class, 'index'])->name('posts.index');
        Route::get('/dashboard', [PostController::class, 'dashboard'])->name('dashboard');
        Route::group(['prefix' => 'posts', 'middleware' => [ 'lang']], function () {
            Route::get('/create', [PostController::class, 'create'])->name('posts.create');
            Route::post('/', [PostController::class, 'store'])->name('posts.store');
            Route::get('/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
            Route::put('/{id}', [PostController::class, 'update'])->name('posts.update');
            Route::delete('/{id}', [PostController::class, 'destroy'])->name('posts.delete');
        // });

        Route::get('/send-notification', [PostController::class, 'sendNotifyUserEmail']);


        Auth::routes(['verify' => true]);

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    }
);
