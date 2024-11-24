<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/users' , [UserController::class , 'getAllusers']);
Route::post('/users' , [UserController::class , 'createUser']);
Route::delete('/users/{id}' , [UserController::class , 'DeleteUser']);



Route::get('/posts' , [UserController::class , 'getAllPostsWithUsers']);
Route::get('/test' , [UserController::class , 'test']);
Route::get('/test2' , [UserController::class , 'test2']);
Route::get('/test3' , [UserController::class , 'test3']);



Route::get('/test4' , [UserController::class , 'test4']);

Route::get('/test5' , [UserController::class , 'test5']);

Route::get('/test6' , [UserController::class , 'test6']);
Route::get('/test7' , [UserController::class , 'test7']);

