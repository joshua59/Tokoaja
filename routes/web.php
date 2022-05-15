<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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
//     return view('welcome');
// });

Route::get('/',[ProductController::class,'index'])->name('home');
Route::get('myproduct',[ProductController::class,'sellerproduct'])->name('sellerproduct');
Route::get('product/create',[ProductController::class,'create'])->name('product.create');
Route::get('product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::post('product/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::post('product/create',[ProductController::class,'store'])->name('product.store');
Route::get('product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
Route::get('product/{id}',[ProductController::class,'detail'])->name('detail');

Route::get('auth',[AuthController::class, 'index'])->name('auth');
Route::post('login',[AuthController::class, 'do_login'])->name('login');
Route::post('register',[AuthController::class, 'do_register'])->name('register');
Route::get('logout',[AuthController::class, 'do_logout'])->name('logout');
Route::get('profile',[UserController::class, 'index'])->name('profile');
Route::get('profile/edit', [UserController::class, 'edit'])->name('profileedit');
Route::post('profile/edit', [UserController::class, 'update'])->name('profileupdate');


Route::group(['middleware' => 'auth:web'], function () {

    
    Route::post('/Profile/update/{id}', [UserController::class, 'profileupdate'])->name('Profileupdate');
});
