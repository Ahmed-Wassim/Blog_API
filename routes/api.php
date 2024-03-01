<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post(
        '/logout',
        [AuthController::class, 'logout']
    );
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [
        AuthController::class, 'userProfile'
    ]);
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('categories', 'index');
    Route::middleware('auth:api')->group(function () {
        Route::post('categories', 'store');
        Route::get('categories/{category:slug}', 'show');
        Route::put('categories/{category:slug}', 'update');
        Route::delete('categories/{category:slug}', 'destroy');
    });
});

Route::controller(TagController::class)->group(function () {
    Route::get('tags', 'index');
    Route::middleware('auth:api')->group(function () {
        Route::post('tags', 'store');
        Route::get('tags/{tag:slug}', 'show');
        Route::put('tags/{tag:slug}', 'update');
        Route::delete('tags/{tag:slug}', 'destroy');
    });
});

Route::controller(PostController::class)->group(function () {
    Route::get('posts', 'index');
    Route::middleware('auth:api')->group(function () {
        Route::post('posts', 'store');
        Route::get('posts/{post:slug}', 'show');
        Route::put('posts/{post:slug}', 'update');
        Route::post('posts/{post:slug}/archive', 'archive');
        Route::delete('posts/{post:slug}', 'destroy');
        Route::patch('posts/{post:slug}/restore', 'restore');
        Route::get('posts/archived', 'Archived');
    });
});
