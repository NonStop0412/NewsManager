<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

// Manager
Route::prefix('/manager')->middleware('auth')->group(function () {

    // Profile page
    Route::get('/profile/{id}', [AdminController::class, 'profile'])->name('manager.profile');

    //Posts
    Route::get('/posts', [PostsController::class, 'index'])->name('manager.posts');
    Route::get('/posts/load', [PostsController::class, 'getPostsByAjax'])->name('manager.posts.load');
    Route::get('/posts/create', [PostsController::class, 'create'])->name('manager.posts.create');
    Route::post('/posts/create/save', [PostsController::class, 'save'])->name('manager.posts.save');

    // Categories
    Route::get('/categories', [CategoriesController::class, 'index'])->name('manager.categories');
    Route::get('/categories/load', [CategoriesController::class, 'getCategoriesByAjax'])->name('manager.categories.load');

    //Tags
    Route::get('/tags', [TagsController::class, 'index'])->name('manager.tags');
    Route::get('/tags/load', [TagsController::class, 'getTagsByAjax'])->name('manager.tags.load');
});

Auth::routes();
