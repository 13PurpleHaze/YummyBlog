<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

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
