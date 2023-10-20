<?php

use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::middleware('auth:sanctum')->group(function() {
    Route::get('/posts', [PostController::class, 'index']);
    
    Route::get('/posts/{id}', [PostController::class, 'show']);
        
    Route::get('/logout', [AuthentificationController::class, 'logout']);
 
    Route::post('/posts', [PostController::class, 'store']);

    Route::patch('/posts/{id}', [PostController::class, 'update'])->middleware('post.owner');

    Route::delete('/posts/{id}', [PostController::class, 'delete'])->middleware('post.owner');

    Route::post('/comment', [CommentController::class, 'store']);
});

Route::post('/login', [AuthentificationController::class, 'login']);
Route::post('/register', [AuthentificationController::class, 'register']);