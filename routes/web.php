<?php

use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Http\Controllers\checkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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
//Route::get('/', function () {
//    return redirect()->route('login');
//});
//
//Route::view('/login', 'authorize.login')->name('login');
//
//Route::view('/register', 'authorize.register')->name('register');
//
//Route::post('/workplace', function () {
//    return view('workplace');
//})->name('workplace');
//Route::get('/workplace', function () {
//    return view('workplace');
//});
//
//Route::prefix('Users')->group(function () {
//    Route::get('/all_data/filtered',[UserController::class,'filterUsers'])->name('filterUsers');
//    Route::view('/add_User', 'users.addUser')->name('addUser');
//    Route::post('/store_user', [UserController::class, 'store'])->name('store_user');
//    Route::get('/all_data', [UserController::class, 'get_all_users'])->name('Users_data');
//    Route::post('/edit_user/{id}', [UserController::class, 'store_edited_user'])->name('store_edited_user');
//    Route::get('/edit_user/{id}', [UserController::class, 'edit_panel_user_data'])->name('edit_user');
//    Route::post('/delete_user/{id}', [UserController::class, 'delete_user'])->name('delete_user');
//
//
//});
//
//Route::prefix('Product')->group(function () {
//    Route::get('/all_products', [ProductController::class, 'all_products'])->name('Products_data');
//    Route::view('/add_Product', 'products.addProduct')->name('addProduct');
//    Route::post('/store_product', [ProductController::class, 'store'])->name('store_product');
//    Route::post('/delete_product/{id}', [ProductController::class, 'delete_product'])->name('delete_product');
//    Route::get('/edit_product/{id}', [ProductController::class, 'edit_product_menu'])->name('edit_product');
//    Route::post('/edit_product/{id}', [ProductController::class, 'store_edited_product'])
//        ->name('store_edit_product');
//});
//
//Route::prefix('Opportunity')->group(function ()
//{
//    Route::view('/add_Opportunity','opportunitys.addOpportunity')->name('addOpportunity');
//    Route::post('/store_opportunities',[OpportunityController::class,'store'])->name('store_opportunities');
//    Route::GET('/all_opportunities' , [OpportunityController::class,'get_all_opportunities'])->name('opportunities_data');
//    Route::GET('/edit_opportunities{id}', [OpportunityController::class,'edit_opportunities'])->name('edit_opportunities');
//    Route::post('/store_edit_opportunities{id}', [OpportunityController::class,'store_edit_opportunities'])->name('store_edit_opportunities');
//    Route::post('/delete_opportunities/{id}', [OpportunityController::class,'delete_opportunities'])->name('opportunities_delete');
//    Route::view('/Opportunitys','opportunitys.opportunitysData')->name('Opportunitys_data');
//
//});
//
//Route::prefix('Check')->group(function ()
//{
//    Route::get('/add_Check',[CheckController::class,'addCheck'])->name('addCheck');
//    Route::post('/submit_Check', [CheckController::class, 'create'])->name('submitCheck');
//    Route::get('/Checks',[CheckController::class,'get_all_checks'])->name('Checks_data');
//    Route::post('/delete_check/{id}',[CheckController::class,'delete_check'])->name('delete_check');
//    Route::post('/edit_check/{id}',[CheckController::class,'store_edited_check'])->name('store_edited_check');
//    Route::get('/edit_check/{id}',[CheckController::class,'editCheck'])->name('edit_check');
//
//});
//
//Route::prefix('Order')->group(function () {
//    Route::get('/Orders', [OrderController::class, 'getAllOrders'])->name('Orders_data');
//    Route::post('/delete_order/{id}', [OrderController::class, 'deleteOrder'])->name('delete_order');
//    Route::post('/store_Order', [OrderController::class, 'addOrder'])->name('store_order');
//    Route::get('/add_Order', [OrderController::class,'addOrderPage'])->name('addOrder');
//    Route::get('edite order/{id}', [OrderController::class, 'editOrder'])->name('edite_user');
//    Route::post('/storing_editedOrder/{id}', [OrderController::class, 'saveEditedOrder'])
//        ->name('save_edited_order');
//});
//
//# GET route for Data options views
//
//
//#profile edit routs
//Route::view('editeProfile', 'prof.editProfile')->name('editProfile');
//Route::view('editeProfImage', 'prof.editProfImage')->name('editProfImage');
//Route::view('editeProfPass', 'prof.editProfPass')->name('editProfPass');
//
//Route::post('/register', function () {
//    return view('workplace');
//})->name('register');