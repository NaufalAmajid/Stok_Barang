<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataBarang;
use App\Models\barangMasuk;
use App\Models\barangKeluar;
use Illuminate\Support\Facades\DB;

class dataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $daBa = dataBarang::get()->all();

        return view('Dashboard.Menu.dataBarang', compact('daBa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dataBarang::create([

            'kode_barang'=>$request->kode_barang,
            'nama_barang'=>$request->nama_barang,
            'harga'=>$request->harga,
            'stok'=>$request->stok


        ]);

        return redirect('dataBarang')->with(['berhasil' => 'Data Barang Berhasil Ditambahkan, Barang Baru = '.$request->nama_barang]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $getID = dataBarang::find($id);
        $getID->update([

            'kode_barang'=>$request->kode_barang,
            'nama_barang'=>$request->nama_barang,
            'harga'=>$request->harga,
            'stok'=>$request->stok

        ]);
        
        return redirect('dataBarang')->with(['edit' => 'Data Barang ' . $request->nama_barang . ' berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $bm = barangMasuk::all();
        $bk = barangKeluar::all();
        $jumlah = count($bm) + count($bk);

        if ($jumlah == 0) {

            $getIDtoDelete = dataBarang::find($id);
            $getIDtoDelete->delete();

            return redirect('dataBarang')->with(['sukses' => 'data barang berhasil dihapus']);

        }else{

           return redirect('dataBarang')->with(['eror' => 'data barang tidak bisa dihapus, silahkan rekap data, lalu kosongkan daftar dimenu']);

       }

        // return redirect('dataBarang');
   }
}
