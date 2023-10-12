<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RolePermissionController;
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
    Route::post('login', 'login')->name('login');
    Route::post('register', 'register')->name('register');
    Route::post('logout', 'logout')->name('logout');
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

Route::group(["prefix" => "opportunities"], function(){
    Route::get('/', [OpportunityController::class, 'index'])->name('opportunities');
    Route::post('/store', [OpportunityController::class, 'store'])->name('store_opportunity_store');
    Route::put('/update/{id}', [OpportunityController::class, 'update'])->name('opportunity_update');
    Route::delete('/delete/{id}', [OpportunityController::class, 'destroy'])->name('opportunity_delete');
    Route::get('/show/{id}', [OpportunityController::class, 'show'])->name('opportunity_show');
});

Route::group(["prefix" => "orders"], function (){
   Route::post("/store", [OrderController::class, 'store'])->name('orders_store');
   Route::put("/update/{id}", [OpportunityController::class, 'update'])->name('order_store');
   Route::get("/", [OpportunityController::class, 'index'])->name('orders');
   Route::get("/show/{id}", [OpportunityController::class, 'show'])->name('order_show');
   Route::delete("/delete/{id}", [OpportunityController::class, 'destroy'])->name('order_delete');
});

Route::group(["prefix" => "roles"], function (){
    Route::get("/", [RolePermissionController::class, 'role_index'])->name('roles');
    Route::post("/store", [RolePermissionController::class, 'role_store'])->name('role_store');
    Route::get('/show/{id}', [RolePermissionController::class, 'role_show'])->name('role_show');
    Route::put('/update/{id}', [RolePermissionController::class, 'role_update'])->name('role_update');
    Route::delete('/delete/{id}', [RolePermissionController::class, 'role_destroy'])->name('role_destroy');
});

Route::group(["prefix" => "permissions"], function (){
    Route::get("/", [RolePermissionController::class, 'permission_index'])->name('permissions');
    Route::post("/store", [RolePermissionController::class, 'permission_store'])->name('permission_store');
    Route::get('/show', [RolePermissionController::class, 'permission_show'])->name('permission_show');
    Route::put('/update', [RolePermissionController::class, 'permission_update'])->name('permission_update');
    Route::delete('/delete', [RolePermissionController::class, 'permission_destroy'])->name('permission_destroy');
});