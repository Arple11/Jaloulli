<?php

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
Route::get('/', function () {
    return redirect()->route('login');
});

Route::view('/login','authorize.login')->name('login');

Route::view('/register', 'authorize.register')->name('register');

Route::post('/workplace', function () {
    return view('workplace');
})->name('workplace');
Route::get('/workplace', function (){
    return view('workplace');
});

Route::prefix('Users')->group(function ()
{
    Route::view('/add_User','users.addUser')->name('addUser');
    Route::post('/store_user',[UserController::class,'store'])->name('store_user');
    Route::get('/all_data',[UserController::class,'get_all_users'])->name('Users_data');
    Route::post('/edit_user/{id}',[UserController::class,'store_edited_user'])->name('store_edited_user');
    Route::get('/edit_user/{id}',[UserController::class,'edit_panel_user_data'])->name('edit_panel');
    Route::post('/delete_user/{id}',[UserController::class,'delete_user'])->name('delete_user');


});

Route::prefix('Product')->group(function ()
{
    Route::get('/all_products',[ProductController::class,'all_products'])->name('Products_data');
    Route::view('/add_Product','products.addProduct')->name('addProduct');
    Route::post('/store_product',[ProductController::class,'store'])->name('store_product');
});

Route::prefix('Opportunity')->group(function ()
{
    Route::view('/add_Opportunity','opportunitys.addOpportunity')->name('addOpportunity');
    Route::view('/Opportunitys','opportunitys.opportunitysData')->name('Opportunitys_data');

});

Route::prefix('Check')->group(function ()
{
    Route::view('/add_Check','checks.addCheck')->name('addCheck');

    Route::post('/submit_Check', [CheckController::class, 'create'])->name('submitCheck');
    Route::view('/Checks','checks.checksData')->name('Checks_data');
});

Route::prefix('Order')->group(function ()
{
    Route::view('/add_Order','orders.addOrder')->name('addOrder');
    Route::view('/Orders','orders.ordersData')->name('Orders_data');


});

# GET route for Data options views







#profile edit routs
Route::view('editeProfile','prof.editProfile')->name('editProfile');
Route::view('editeProfImage','prof.editProfImage')->name('editProfImage');
Route::view('editeProfPass','prof.editProfPass')->name('editProfPass');

Route::post('/register',function (){
    return view('workplace');
})->name('register');