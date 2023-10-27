<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\articleController;
use App\Http\Controllers\NewsletterSubscriberController;
use App\Http\Controllers\AdminController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/tags', [TagController::class, 'index']);
Route::get('/articles', [ArticleController::class, 'fetchArticles']);
Route::get('/latest-articles', [ArticleController::class, 'latestArticles']);
Route::get('/latest-featured-articles', [ArticleController::class, 'latestFeaturedArticles']);
Route::get('/admins', [AdminController::class, 'index']);



Route::post('/subscribe', [NewsletterSubscriberController::class, 'subscribe']);
