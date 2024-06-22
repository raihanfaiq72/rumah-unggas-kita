<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','Buyer\DashboardController@index');
Route::get('produk','Buyer\DashboardController@produk');
Route::get('produk/{id}','Buyer\DashboardController@produkShow');
Route::get('toko','Buyer\DashboardController@toko');
Route::get('toko/produk/{id}','Buyer\DashboardController@tokoShow');
Route::get('tentang-kami','Buyer\DashboardController@tentangkami');
Route::get('kategori/show/{id}','Buyer\DashboardController@kategoriShow');
Route::get('hasil-pencarian','Buyer\DashboardController@search');

Route::fallback(function () {
    return view('404.404');
});


Route::get('login','Auth\AuthController@login');
Route::post('loginProses','Auth\AuthController@loginProses');
Route::get('register','Auth\AuthController@register');
Route::post('registerProses','Auth\AuthController@registerProses');
Route::get('logout','Auth\AuthController@logout');

Route::middleware(['login'])->group(function () {


    Route::middleware(['seller'])->group(function () {
        Route::resource('user/dashboard','Seller\DashboardController');
        Route::resource('user/toko','Seller\TokoController');
        Route::resource('user/profile','Seller\UsersController');
        Route::resource('user/item-toko','Seller\ItemTokoController');
        Route::resource('user/management-transaksi-toko','Seller\ManagementTransaksiTokoController');
    });

});