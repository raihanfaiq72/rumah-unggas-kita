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
Route::get('invoice/{id}','Buyer\DashboardController@invoice');
Route::get('review/{id}','Buyer\DashboardController@reviewCreate');
Route::post('review-barang','Buyer\DashboardController@reviewStore');


Route::fallback(function () {
    return view('404.404');
});


Route::get('login','Auth\AuthController@login');
Route::post('loginProses','Auth\AuthController@loginProses');
Route::get('register','Auth\AuthController@register');
Route::post('registerProses','Auth\AuthController@registerProses');
Route::get('logout','Auth\AuthController@logout');

Route::get('pdf-tes','PDFController@index');

Route::middleware(['login'])->group(function () {


    Route::middleware(['seller'])->group(function () {
        Route::get('cekot','Buyer\DashboardController@cekotShow');
        Route::get('cekot-staging/{id}','Buyer\DashboardController@cekotStaging');
        Route::get('cekot-sebelum-staging/{id}','Buyer\DashboardController@cekotsblmStaging');
        Route::post('cekot-final','Buyer\DashboardController@cekotFinal');
        Route::post('add-to-cart', 'Buyer\DashboardController@addToCart');
        Route::delete('delete-item/{id}', 'Buyer\DashboardController@deleteItem')->name('delete-item');

        Route::resource('user/dashboard','Seller\DashboardController');
        Route::resource('user/toko','Seller\TokoController');
        Route::resource('user/profile','Seller\UsersController');
        Route::resource('user/item-toko','Seller\ItemTokoController');
        Route::resource('user/management-transaksi-toko','Seller\ManagementTransaksiTokoController');
        Route::resource('user/cekot','Seller\CekotController');
    });

});