<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user', [App\Http\Controllers\HomeController::class, 'user']);

Route::group(['prefix' => 'category'], function () {
    Route::get('add', [App\Http\Controllers\HomeController::class, 'addcategory']);
    Route::post('store', [App\Http\Controllers\HomeController::class, 'storecategory']);
});

Route::group(['prefix' => 'product'], function () {
    Route::get('add/{id}', [App\Http\Controllers\HomeController::class, 'addproduct']);
    Route::post('store', [App\Http\Controllers\HomeController::class, 'storeproduct']);
});
