<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\LoginController;

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

Route::post('category/{category}/articles', [ArticleController::class, 'create']);
Route::post('category', [CategoryController::class, 'create']);
Route::post('tag', [TagController::class, 'create'])->name('tag');
Route::post('subscription', [SubscriptionController::class, 'create']);
Route::post('login', [LoginController::class, 'login']);
