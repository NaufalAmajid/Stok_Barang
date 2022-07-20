<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataBarang;
use App\Models\barangKeluar;
use Illuminate\Support\Facades\DB;
use PDF;

class barangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $bm = DB::table('barang_keluars')->join('data_barang','barang_keluars.kode_barang','=', 'data_barang.kode_barang')
        ->select('data_barang.nama_barang', 'barang_keluars.*')
        ->get();
        
        $db = dataBarang::get()->all();

        return view('Dashboard.Menu.barangKeluar', compact('bm', 'db'));
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

        $validationData =  $request->validate([
            'kode_barang' => 'required',
            'stok' => 'required'
        ]);

        barangKeluar::create([

            'kode_barang'=>$validationData['kode_barang'],
            'stok'=>$validationData['stok']


        ]);

        return redirect('dataBarang');
        // dd($request->all());
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tampildata(){

        $bk = barangKeluar::join('data_barang','barang_keluars.kode_barang','=', 'data_barang.kode_barang')
        ->select('data_barang.nama_barang', 'barang_keluars.*')
        ->get();

        return view('Dashboard.Cetak.cetakbarangkeluar', compact('bk'));

    }

    public function cetak()
    {
        $bk = barangKeluar::join('data_barang','barang_keluars.kode_barang','=', 'data_barang.kode_barang')
        ->select('data_barang.nama_barang', 'barang_keluars.*')
        ->latest()->get();

        $pdf = PDF::loadview('Dashboard.Cetak.Hasil.barangkeluar',compact('bk'));
        return $pdf->download('laporan-barang-keluar.pdf');
    }

}
