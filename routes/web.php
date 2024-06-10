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
Route::get('login','Auth\AuthController@login');
Route::post('loginProses','AuthController@loginProses');
Route::get('register','Auth\AuthController@register');
Route::post('registerProses','Auth\AuthController@registerProses');
