<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    DiggingDeeperController,
};
use App\Http\Controllers\Blog\{
    PostController as PublicBlogPostController,
    Admin\CategoryController,
    Admin\PostController,
};

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('digging_deeper')->group(function() {
    Route::get('collections', [DiggingDeeperController::class,'collections'])
        ->name('digging_deeper.collections');

    Route::get('process-video', [DiggingDeeperController::class,'processVideo'])
        ->name('digging_deeper.processVideo');

    Route::get('prepare-catalog', [DiggingDeeperController::class,'prepareCatalog'])
        ->name('digging_deeper.prepareCatalog');
});

Route::prefix('blog')->group(function() {
    Route::resource('posts', PublicBlogPostController::class)->names('blog.posts');
});

//> Админка блога
Route::prefix('admin/blog')->group(function() {
    //Blog Category
    $methods = ['index', 'edit', 'store', 'update', 'create',];
    Route::resource('categories', CategoryController::class)
        ->only($methods)
        ->names('blog.admin.categories');

    // BlogPost
    Route::resource('posts', PostController::class)
        ->except(['show'])
        ->names('blog.admin.posts');
    Route::get('posts/restore/one/{post}', [PostController::class, 'restore'])
        ->name('blog.admin.posts.restore');
});
//<

// Route::resource('rest', RestTestController::class)->names('restTest');

Route::prefix('structural')->group(function () {
    Route::get('decorator', [\App\Http\Controllers\StructuralPatternsController::class, 'Decorator']);
    Route::get('proxy', [\App\Http\Controllers\StructuralPatternsController::class, 'proxy']);
});
