<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PlaceController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\SubCategoryController;
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

Route::name('Admin.')->controller(IndexController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});
Route::prefix('Category/')->name('Category.')->controller(CategoryController::class)->group(function () {
    Route::get('index', 'index')->name('index');
    Route::post('store', 'store')->name('store');
    Route::put('update/{id}', 'update')->name('update');
    Route::get('delete/{id}', 'delete')->name('delete');
});

Route::prefix('SubCategory/')->name('SubCategory.')->controller(SubCategoryController::class)->group(function () {
    Route::get('index', 'index')->name('index');
    Route::post('store', 'store')->name('store');
    Route::put('update/{id}', 'update')->name('update');
    Route::get('delete/{id}', 'delete')->name('delete');
});

Route::prefix('Product/')->name('Product.')->controller(ProductController::class)->group(function () {
    Route::get('index', 'index')->name('index');
    Route::post('store', 'store')->name('store');
    Route::put('update/{id}', 'update')->name('update');
    Route::get('delete/{id}', 'delete')->name('delete');
});

Route::prefix('Banner/')->name('Banner.')->controller(BannerController::class)->group(function () {
    Route::get('index', 'index')->name('index');
    Route::post('store', 'store')->name('store');
    Route::put('update/{id}', 'update')->name('update');
    Route::get('delete/{id}', 'delete')->name('delete');
    Route::get('success', 'success')->name('success');
    Route::get('secondary', 'secondary')->name('secondary');
});

Route::prefix('Place/')->name('Place.')->controller(PlaceController::class)->group(function() {
    Route::get('index','index')->name('index');
    Route::post('store','store')->name('store');
    Route::put('update/{id}','update')->name('update');
    Route::get('delete/{id}','delete')->name('delete');
});

Route::prefix('Orders/')->name('Orders.')->controller(OrderController::class)->group(function(){
    Route::get('index','index')->name('index');
});

Route::prefix('Reservation/')->name('Reservation.')->controller(ReservationController::class)->group(function () {
    Route::get('index', 'index')->name('index');
});
