<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [\App\Http\Controllers\Main\MainController::class, 'index'])->name('main.index');/*
Route::get('/', [\App\Http\Controllers\Main\AboutController::class, 'index'])->name('about.index');
Route::get('/', [\App\Http\Controllers\Main\Contactontroller::class, 'index'])->name('contact.index');*/
Route::group(['prefix' => 'posts'], function() {
    Route::get('/', [\App\Http\Controllers\Post\PostController::class, 'index'])->name('post.index');
    Route::get('/{post}', [\App\Http\Controllers\Post\PostController::class, 'show'])->name('post.show');
    Route::group(['prefix' => '{post}/comments'], function() {
        Route::post('/', [\App\Http\Controllers\Post\CommentController::class, 'store'])->name('post.comment.store');
    });
    Route::group(['prefix' => '{post}/likes'], function() {
        Route::post('/', [\App\Http\Controllers\Post\LikeController::class, 'store'])->name('post.like.store');
    });
});
Route::group(['prefix' => 'categories'], function() {
    Route::get('/', [\App\Http\Controllers\Category\CategoryController::class, 'index'])->name('category.index');
    Route::group(['prefix' => '{category}/posts'],function () {
        Route::get('/', [\App\Http\Controllers\Category\PostController::class, 'index'])->name('category.post.index');
    });
});
Route::group(['prefix' => 'tags'], function() {
    Route::get('/', [\App\Http\Controllers\Tag\TagController::class, 'index'])->name('tag.index');
    Route::group(['prefix' => '{tag}/posts'],function () {
        Route::get('/', [\App\Http\Controllers\Tag\PostController::class, 'index'])->name('tag.post.index');
    });
});


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::get('/', [App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin.main.index');
    Route::get('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/categories/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/categories/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('admin.category.show');
    Route::get('/categories/edit/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::patch('/categories/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/categories/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin.category.destroy');

    Route::get('/tags', [App\Http\Controllers\Admin\TagController::class, 'index'])->name('admin.tag.index');
    Route::get('/tags/create', [App\Http\Controllers\Admin\TagController::class, 'create'])->name('admin.tag.create');
    Route::post('/tags', [App\Http\Controllers\Admin\TagController::class, 'store'])->name('admin.tag.store');
    Route::get('/tags/{tag}', [App\Http\Controllers\Admin\TagController::class, 'show'])->name('admin.tag.show');
    Route::get('/tags/edit/{tag}', [App\Http\Controllers\Admin\TagController::class, 'edit'])->name('admin.tag.edit');
    Route::patch('/tags/{tag}', [App\Http\Controllers\Admin\TagController::class, 'update'])->name('admin.tag.update');
    Route::delete('/tags/{tag}', [App\Http\Controllers\Admin\TagController::class, 'destroy'])->name('admin.tag.destroy');

    Route::get('/posts', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('admin.post.index');
    Route::get('/posts/create', [App\Http\Controllers\Admin\PostController::class, 'create'])->name('admin.post.create');
    Route::post('/posts', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('admin.post.store');
    Route::get('/posts/{post}', [App\Http\Controllers\Admin\PostController::class, 'show'])->name('admin.post.show');
    Route::get('/posts/edit/{post}', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('admin.post.edit');
    Route::patch('/posts/{post}', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('admin.post.update');
    Route::delete('/posts/{post}', [App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('admin.post.destroy');

    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
    Route::get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.user.create');
    Route::post('/users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.user.store');
    Route::get('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin.user.show');
    Route::get('/users/edit/{user}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.user.edit');
    Route::patch('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.user.destroy');

    Route::get('/edit/{user}', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.user.edit');
    Route::patch('/{user}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user.update');
});

Route::group(['prefix' => 'personal', 'namespace' => 'Personal', 'middleware' => ['auth', 'verified']], function() {
    Route::get('/', [App\Http\Controllers\Personal\MainController::class, 'index'])->name('personal.main.index');
    Route::get('/likes', [App\Http\Controllers\Personal\LikeController::class, 'index'])->name('personal.like.index');
    Route::delete('/likes/{post}', [App\Http\Controllers\Personal\LikeController::class, 'destroy'])->name('personal.like.destroy');
    Route::get('/comments', [App\Http\Controllers\Personal\CommentController::class, 'index'])->name('personal.comment.index');
    Route::get('/comments/edit/{comment}', [App\Http\Controllers\Personal\CommentController::class, 'edit'])->name('personal.comment.edit');
    Route::patch('/comments/{comment}', [App\Http\Controllers\Personal\CommentController::class, 'update'])->name('personal.comment.update');
    Route::delete('/comments/{comment}', [App\Http\Controllers\Personal\CommentController::class, 'destroy'])->name('personal.comment.destroy');

    Route::get('/edit', [\App\Http\Controllers\Personal\UserController::class, 'edit'])->name('personal.user.edit');
    Route::patch('/{user}', [\App\Http\Controllers\Personal\UserController::class, 'update'])->name('personal.user.update');
});
