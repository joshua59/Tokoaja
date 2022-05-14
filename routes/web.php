<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

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

Route::get('auth',[AuthController::class, 'index'])->name('auth');
Route::post('login',[AuthController::class, 'do_login'])->name('login');
Route::post('register',[AuthController::class, 'do_register'])->name('register');

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('logout',[AuthController::class, 'do_logout'])->name('logout');
});
