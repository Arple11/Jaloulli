<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

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


# GET route for adding options views
Route::view('/add_Product','products.addProduct')->name('addProduct');
Route::view('/add_User','users.addUser')->name('addUser');
Route::view('/add_Order','orders.addOrder')->name('addOrder');
Route::view('/add_Opportunity','opportunitys.addOpportunity')->name('addOpportunity');
Route::view('/add_Check','checks.addCheck')->name('addCheck');

# GET route for Data options views
Route::view('/Products','products.productsData')->name('Products_data');
Route::view('/Users','users.usersData')->name('Users_data');
Route::view('/Orders','orders.ordersData')->name('Orders_data');
Route::view('/Opportunitys','opportunitys.opportunitysData')->name('Opportunitys_data');
Route::view('/Checks','checks.checksData')->name('Checks_data');

Route::post('/Users')->name('editUserData');


Route::post('/register',function (){
    return view('workplace');
})->name('register');