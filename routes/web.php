<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\DashboardTagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;


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


Auth::routes();
// Route::get('/register', function () {
//     return redirect('/');
// });
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function(){
        return redirect(route('dashboard', auth()->user()->username));
    });
    Route::get('/dashboard/profile', function(){
        return redirect(route('dashboard', auth()->user()->username));
    });
    // dashboard
    Route::get('/dashboard/profile/{users:username}', [DashboardProfileController::class, 'show'])->name('dashboard');
    Route::get('/dashboard/profile/{users:username}/edit', [DashboardProfileController::class, 'edit'])->name('profile-edit');
    Route::patch('/dashboard/profile/{users:username}',[DashboardProfileController::class, 'update']);
    // Posts
    Route::get('/dashboard/posts', [DashboardPostController::class, 'index'])->name('admin-posts');
    Route::get('/dashboard/posts/create', [DashboardPostController::class, 'create'])->name('create-post');
    Route::post('/dashboard/posts/create', [DashboardPostController::class, 'store']);
    Route::get('/dashboard/posts/{id}/edit', [DashboardPostController::class, 'edit'])->name('edit-post');
    Route::patch('/dashboard/posts/{id}/edit', [DashboardPostController::class, 'update']);
    Route::delete('/dashboard/posts/{id}', [DashboardPostController::class, 'destroy']);
    // Category
    Route::get('/dashboard/category', [DashboardCategoryController::class, 'index'])->name('admin-category');
    Route::get('/dashboard/category/create', [DashboardCategoryController::class, 'create'])->name('create-category');
    Route::post('/dashboard/category/create', [DashboardCategoryController::class, 'store']);
    Route::get('/dashboard/category/{id}/edit', [DashboardCategoryController::class, 'edit'])->name('edit-category');
    Route::patch('/dashboard/category/{id}/edit', [DashboardCategoryController::class, 'update']);
    Route::delete('/dashboard/category/{id}', [DashboardCategoryController::class, 'destroy']);


    // Tag
    Route::get('/dashboard/tag', [DashboardTagController::class, 'index'])->name('admin-tag');
    Route::get('/dashboard/tag/create', [DashboardTagController::class, 'create'])->name('create-tag');
    Route::post('/dashboard/tag/create', [DashboardTagController::class, 'store']);
    Route::get('/dashboard/tag/{id}/edit', [DashboardTagController::class, 'edit'])->name('edit-tag');
    Route::patch('/dashboard/tag/{id}/edit', [DashboardTagController::class, 'update']);
    Route::delete('/dashboard/tag/{id}', [DashboardTagController::class, 'destroy']);

});
Route::get('/', HomeController::class, 'index')->name('home');
Route::get('/posts', [PostController::class, 'index'])->name('blog');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('single-post');
Route::get('/tag/{id}', [TagController::class, 'show'])->name('single-tag');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('single-category');