<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {

    return view('Dashboard.Menu.dashboard');

});


Route::resource('dataBarang', 'App\Http\Controllers\dataBarangController');

Route::resource('barangMasuk', 'App\Http\Controllers\barangMasukController');

Route::resource('barangKeluar', 'App\Http\Controllers\barangKeluarController');

Route::resource('supplier', 'App\Http\Controllers\SupplierController');