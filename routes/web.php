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

});


Route::resource('dataBarang', 'App\Http\Controllers\dataBarangController');

Route::resource('barangMasuk', 'App\Http\Controllers\barangMasukController');

Route::resource('barangKeluar', 'App\Http\Controllers\barangKeluarController');

Route::resource('supplier', 'App\Http\Controllers\SupplierController');

Route::get('kosong', function () {

    DB::table('barang_masuk')->truncate();

    return redirect('barangMasuk')->with(['kosong' => 'data barang masuk berhasil dikosongkan']);

});

Route::get('kosong2', function () {

    DB::table('barang_keluars')->truncate();

    return redirect('barangKeluar')->with(['kosong' => 'data barang keluar berhasil dikosongkan']);

});

Route::get('tampilsupplier', 'App\Http\Controllers\SupplierController@tampildata');
Route::get('tampilbm', 'App\Http\Controllers\barangMasukController@tampildata');
Route::get('tampilbk', 'App\Http\Controllers\barangKeluarController@tampildata');
Route::get('cetaks', 'App\Http\Controllers\SupplierController@cetak');
Route::get('cetakbm', 'App\Http\Controllers\barangMasukController@cetak');
Route::get('cetakbk', 'App\Http\Controllers\barangKeluarController@cetak');

