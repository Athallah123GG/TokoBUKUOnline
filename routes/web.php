<?php

use App\Models\Publisher;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublisherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Main Page
Route::get('/' ,[MainController::class,'index'])->name('welcome');
Route::get('/features' ,[MainController::class, 'features'])->name('features');
Route::get('/pricing',[MainController::class ,'pricing'])->name('pricing');

Route::get('/login' , [AuthController::class,'index'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/unauthenticate' , [AuthController::class , 'unauthenticate'])->name('unauthenticate');

Route::get('/register' , [AuthController::class , 'register'])->name('register');
Route::post('/store-registrasi' , [AuthController::class, 'store_registrasi'])->name('storeUser'); //Function Register




Route::group(['middleware' => ['auth','admin_middleware']],function(){
    Route::get('/dashboard' , [DashboardController::class , 'dashboard'])->name('dashboard');

    // category route
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');

    // publisher route
    Route::get('/publisher', [PublisherController::class, 'index'])->name('publisher.index');
    Route::get('/publisher/{id}/edit', [PublisherController::class, 'edit'])->name('publisher.edit');
    Route::put('/publisher/{id}', [PublisherController::class, 'update'])->name('publisher.update');
    Route::get('/publisher/create', [PublisherController::class, 'create'])->name('publisher.create');
    Route::post('/publisher', [PublisherController::class, 'store'])->name('publisher.store');

    // Books Route
    Route::get('/book' , [BookController::class ,'index'])->name('book.index');
    Route::get('/book/create' , [BookController::class ,'create'])->name('book.create');
    Route::post('/book' , [BookController::class ,'store'])->name('book.store'); 
    Route::get('/book/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/book/{id}', [BookController::class, 'update'])->name('book.update');
    Route::delete('/book/{id}',[BookController::class, 'destroy'])->name('book.destroy');
    Route::get('book/datatable',[BookController::class , 'datatable'])->name('book.datatable');

    // Cart Route
    Route::post('cart',[CartController::class , 'store'])->name('cart.store');


});

//Detail Bisa Di Akses Semua Orang
Route::get('/book/{id}',[BookController::class, 'show'])->name('book.show');



