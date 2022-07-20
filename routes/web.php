<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

    $bm = DB::table('barang_masuk')->get();
    $jbm =count($bm);
    $bk = DB::table('barang_keluars')->get();
    $jbk = count($bk);
    $s = DB::table('supplier')->get();
    $js = count($s); 

    return view('Dashboard.Menu.dashboard', compact('jbm', 'jbk', 'js'));

})->middleware('auth');

Route::get('login', 'App\Http\Controllers\LoginController@index')->name('login')->middleware('guest');
Route::post('login', 'App\Http\Controllers\LoginController@login')->name('prosesLogin')->middleware('guest');
Route::post('logout', 'App\Http\Controllers\LoginController@logout')->name('logout')->middleware('auth');

Route::resource('dataBarang', 'App\Http\Controllers\dataBarangController')->middleware('auth');

Route::resource('barangMasuk', 'App\Http\Controllers\barangMasukController')->middleware('auth');

Route::resource('barangKeluar', 'App\Http\Controllers\barangKeluarController')->middleware('auth');

Route::resource('supplier', 'App\Http\Controllers\SupplierController')->middleware('auth');

Route::get('kosong', function () {

    DB::table('barang_masuk')->truncate();

    return redirect('barangMasuk')->with(['kosong' => 'data barang masuk berhasil dikosongkan']);

})->middleware('auth');

Route::get('kosong2', function () {

    DB::table('barang_keluars')->truncate();

    return redirect('barangKeluar')->with(['kosong' => 'data barang keluar berhasil dikosongkan']);

})->middleware('auth');

Route::get('tampilsupplier', 'App\Http\Controllers\SupplierController@tampildata')->middleware('auth');
Route::get('tampilbm', 'App\Http\Controllers\barangMasukController@tampildata')->middleware('auth');
Route::get('tampilbk', 'App\Http\Controllers\barangKeluarController@tampildata')->middleware('auth');
Route::get('cetaks', 'App\Http\Controllers\SupplierController@cetak')->middleware('auth');
Route::get('cetakbm', 'App\Http\Controllers\barangMasukController@cetak')->middleware('auth');
Route::get('cetakbk', 'App\Http\Controllers\barangKeluarController@cetak')->middleware('auth');

Route::get('ower', 'App\Http\Controllers\OwnerController@index')->name('owner')->middleware('auth');

