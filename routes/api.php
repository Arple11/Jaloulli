<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::controller(AuthController::class)->group(function() {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
});

Route::group(["prefix" => "users", "middleware" => "auth:sanctum"], function (){
    Route::get("/" , [UserController::class, 'index'])->name('users');
    Route::post("/store" , [UserController::class, 'store'])->name('User_store');
    Route::delete("/delete/{id}" , [UserController::class, 'destroy'])->name('User_delete');
    Route::get("/show/{id}" , [UserController::class, 'show'])->name("User_show");
    Route::put("/update/{id}" , [UserController::class, 'update'])->name('User_update');
});

Route::group(["prefix" => "products"], function (){
    Route::get("/" , [ProductController::class, 'index'])->name('products');
    Route::post("/store" , [ProductController::class, 'store'])->name('Product_store');
    Route::delete("/delete/{id}" , [ProductController::class, 'destroy'])->name('Product_delete');
    Route::get("/show/{id}" , [ProductController::class, 'show'])->name("Product_show");
    Route::put("/update/{id}" , [ProductController::class, 'update'])->name('Product_update');
});

Route::group(["prefix" => "opportunity"], function(){
    Route::get('opportunities_data', [OpportunityController::class, 'get_all_opportunities'])->name('opportunities_data');
    Route::post('store_opportunities', [OpportunityController::class, 'store'])->name('store_opportunities');
    Route::put('edit_opportunities', [OpportunityController::class, 'edit'])->name('edit_opportunities');
    Route::delete('opportunities_delete', [OpportunityController::class, 'delete'])->name('opportunities_delete');
});

Route::group(["prefix" => "orders"], function (){
   Route::post("/store_orders", [\App\Http\Controllers\OrderController::class, 'store'])->name('store_orders');
});