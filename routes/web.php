<?php

use App\Http\Controllers\DB;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontLandingController;


// use DB;

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

// Route::get('/', function () {
//     return view('front.landing');
// });

// // Route::get('/user', function () {
// //     return view('user.index');
// // });

// Route::get('/category', function () {
//     return view('category.index');
// });

// Route::get('/product', function () {
//     return view('product.index');
// });

// Route::get('/landing', function () {
//     return view('front.landing');
// });


Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::post('/addproduct', [ProductController::class, 'store'])->name('createproduct');
Route::get('/tampilproduct/{id}', [ProductController::class, 'tampilproduct'])->name('tampilproduct');
Route::post('/updateproduct/{id}', [ProductController::class, 'update'])->name('updateproduct');
Route::get('/destroyproduct/{id}', [ProductController::class, 'destroy'])->name('destroyproduct');



Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::post('/addcategory', [CategoryController::class, 'store'])->name('createcategory');
Route::get('/tampilkancategory/{id}', [CategoryController::class, 'tampilkancategory'])->name('tampilkancategory');
// Route::post('/updatecategory/{id}', [CategoryController::class, 'updatecategory'])->name('updatecategory');
Route::get('/destroycategory/{id}', [CategoryController::class, 'destroy'])->name('destroycategory');
Route::post('/updatedata/{id}', [CategoryController::class, 'updatedata'])->name('updatedata');



Route::get('/user', [UserController::class, 'index'])->name('user');
Route::post('/adduser', [UserController::class, 'store'])->name('adduser');
Route::get('/destroyuser/{id}', [UserController::class, 'destroy'])->name('destroyuser');
Route::get('/tampiluser/{id}', [UserController::class, 'show'])->name('tampiluser');
Route::post('/userupdate/{id}', [UserController::class, 'update'])->name('userupdate');


Route::get('/frontlanding', [FrontLandingController::class, 'index'])->name('frontlanding');
Route::get('/', [FrontLandingController::class, 'index']);





// Route::get('/tickets', [TicketController::class, 'index'])->name('tickets');
// 	Route::get('/createtickets', [TicketController::class, 'create'])->name('createtickets');
// 	Route::post('/inserttickets', [TicketController::class, 'store'])->name('inserttickets');
// 	Route::get('/showtickets{id}', [TicketController::class, 'show'])->name('showtickets');
// 	Route::post('/updatetickets{id}', [TicketController::class, 'update'])->name('updatetickets');
// 	Route::get('/destroytickets{id}', [TicketController::class, 'destroy'])->name('destroytickets');
