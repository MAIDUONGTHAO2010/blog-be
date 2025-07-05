<?php

use Illuminate\Support\Facades\Route;
use Modules\User\App\Http\Controllers\CategoryController;
use Modules\User\App\Http\Controllers\PostController;
use Modules\User\App\Http\Controllers\PresignedUrlController;

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

Route::prefix('v1')->group(function () {
    Route::resource('posts', PostController::class)
        ->only(['index', 'show']);
    // ->whereNumber(['posts' => 'postId']);

    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('get-posts-by-categories', [PostController::class, 'getPostsByCategories']);
    Route::get('presigned-url', [PresignedUrlController::class, 'generate']);

});
