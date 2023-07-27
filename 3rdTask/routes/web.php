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

Route::view('/add_Product','products.addProduct')->name('addProduct');
Route::view('/add_User','users.addUser')->name('addUser');
Route::view('/add_Order','orders.addOrder')->name('addOrder');
Route::view('/add_Opportunity','opportunitys.addOpportunity')->name('addOpportunity');
Route::view('/add_Check','checks.addCheck')->name('addCheck');

Route::post('/register',function (){
    return view('workplace');
})->name('register');