<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('isAdmin')->group(function () {
//    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/manage', [App\Http\Controllers\ProductsController::class, 'manage'])->name('manage');
    Route::put('/updateProducts/{id}', [App\Http\Controllers\ProductsController::class, 'update'])->name('update');
    Route::get('/editProducts/{id}', [App\Http\Controllers\ProductsController::class, 'edit'])->name('edit');
    Route::post('/saveProducts', [App\Http\Controllers\ProductsController::class, 'store'])->name('store');
    Route::get('/products', [App\Http\Controllers\ProductsController::class, 'products'])->name('products');
    Route::get('/main', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
    Route::delete('/deleteProducts/{id}', [App\Http\Controllers\ProductsController::class, 'destroy'])->name('destroy');
});

Route::middleware('isMod')->group(function () {
    Route::delete('/moddeleteProducts/{id}', [App\Http\Controllers\ProductsController::class, 'moddestroy'])->name('moddestroy');
    Route::get('/modeditProducts/{id}', [App\Http\Controllers\ProductsController::class, 'modedit'])->name('modedit');
    Route::get('/modmanage', [App\Http\Controllers\ProductsController::class, 'modmanage'])->name('modmanage');
    Route::get('/moderator', [App\Http\Controllers\IndexController::class, 'moderator'])->name('moderator');
});

Route::middleware('isUser')->group(function () {
    Route::get('/user', [App\Http\Controllers\IndexController::class, 'user'])->name('user');
    Route::get('/view', [App\Http\Controllers\IndexController::class, 'view'])->name('view');
});











