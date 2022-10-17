<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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
    return response()->json($request->user());
});

Route::post('/users/create', [UserController::class, 'create']);

Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index');
    Route::post('/posts/create', 'create');
    Route::get('/posts/{id}', 'show')->where('id', '[0-9]+');
    Route::patch('/posts/{id}/update', 'update')->where('id', '[0-9]+');
    Route::delete('/posts/{id}/destroy', 'destroy')->where('id', '[0-9]+');
});
