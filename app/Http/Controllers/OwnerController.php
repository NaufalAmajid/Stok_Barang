<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{
    public function index()
    {
        $bm = DB::table('barang_masuk')->join('data_barang','barang_masuk.kode_barang','=', 'data_barang.kode_barang')
        ->join('supplier','barang_masuk.kode_supplier','=', 'supplier.kode_supplier')
        ->select('data_barang.nama_barang', 'barang_masuk.*', 'supplier.nama_supplier')
        ->get();

        $dasu = Supplier::get()->all();

        $bk = DB::table('barang_keluars')->join('data_barang','barang_keluars.kode_barang','=', 'data_barang.kode_barang')
        ->select('data_barang.nama_barang', 'barang_keluars.*')
        ->get();

        return view('Dashboard.Menu.ownerPage', compact('bm', 'bk', 'dasu'));
    }
}
