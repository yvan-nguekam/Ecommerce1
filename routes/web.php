<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AppController::class, 'index'])->name('app.index');

Auth::routes();

Route::middleware('auth')->group(function(){
  Route::get('/my-account', [UserController::class, 'index'])->name('user.index');
});

Route::middleware('auth', 'auth.admin')->group(function(){
  Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
