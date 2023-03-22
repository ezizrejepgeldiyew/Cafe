<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\BasketController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SubcategoryController;
use Illuminate\Support\Facades\Route;

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

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/banner', [BannerController::class, 'index']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/popular/product', [ProductController::class, 'popular']);
Route::get('/recommended/product', [ProductController::class, 'recommended']);

Route::get('/subcategory/{id?}',[SubcategoryController::class,'getCategorySubcategories']);
Route::get('/subcategory/product/{id?}',[SubcategoryController::class, 'getSubcategoryProducts']);

Route::post('/basket',[BasketController::class,'get']);

Route::get('/category/product/{id?}',[CategoryController::class,'getCategoryProducts']);

Route::post('/order',[OrderController::class,'get']);
Route::post('/order/store',[OrderController::class,'store']);
Route::post('/order/product-store',[OrderController::class,'productStore']);
Route::get('/order/place',[OrderController::class,'place']);

