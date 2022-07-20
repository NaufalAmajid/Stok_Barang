<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\barangMasuk;
use App\Models\Supplier;
use App\Models\dataBarang;
use Illuminate\Http\Request;
use PDF;

class barangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $bm = DB::table('barang_masuk')->join('data_barang','barang_masuk.kode_barang','=', 'data_barang.kode_barang')
        ->join('supplier','barang_masuk.kode_supplier','=', 'supplier.kode_supplier')
        ->select('data_barang.nama_barang', 'barang_masuk.*', 'supplier.nama_supplier')
        ->get();

        $supplier = Supplier::get()->all();
        $db = dataBarang::get()->all();                     

        return view('Dashboard.Menu.barangMasuk', compact('bm', 'db', 'supplier'));
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
            'kode_supplier' => 'required',
            'stok' => 'required'
        ]);

        barangMasuk::create([

            'kode_barang'=>$validationData['kode_barang'],
            'kode_supplier'=>$validationData['kode_supplier'],
            'stok'=>$validationData['stok']


        ]);

        return redirect('dataBarang')->with(['stok' => 'Stok Barang Berhasil Ditambahkan']);
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

        $bm = barangMasuk::join('data_barang','barang_masuk.kode_barang','=','data_barang.kode_barang')
        ->join('supplier','barang_masuk.kode_supplier','=','supplier.kode_supplier')
        ->select('barang_masuk.*', 'data_barang.nama_barang','supplier.nama_supplier')

        ->latest()->get();

        return view('Dashboard.Cetak.cetakbarangmasuk', compact('bm'));

    }


    public function cetak()
    {
        $bm = barangMasuk::join('data_barang','barang_masuk.kode_barang','=','data_barang.kode_barang')
        ->join('supplier','barang_masuk.kode_supplier','=','supplier.kode_supplier')
        ->select('barang_masuk.*', 'data_barang.nama_barang','supplier.nama_supplier')

        ->latest()->get();

        $pdf = PDF::loadview('Dashboard.Cetak.Hasil.barangmasuk',compact('bm'));
        return $pdf->download('laporan-barang-masuk.pdf');
    }

}
