<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;



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

#Category API
Route::get('getCategory', [CategoryController::class, 'index']);
Route::post('postCategory', [CategoryController::class, 'create']);
Route::post('deleteCategory/{id}', [CategoryController::class, 'destroy']);
Route::post('updateCategory', [CategoryController::class, 'update']);

#Product API
Route::get('getProduct', [ProductController::class, 'index']);
Route::post('postProduct', [ProductController::class, 'create']);
Route::post('updateProduct', [ProductController::class, 'update']);
Route::post('deleteProduct/{id}', [ProductController::class, 'destroy']);
