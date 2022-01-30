<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\barangMasuk;
use App\Models\Supplier;
use App\Models\dataBarang;
use Illuminate\Http\Request;

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
                             ->select('data_barang.*', 'barang_masuk.*')
                             ->get();

        $bmS = DB::table('barang_masuk')
                             ->join('supplier','barang_masuk.kode_supplier','=', 'supplier.kode_supplier')
                             ->select('supplier.*', 'barang_masuk.*')
                             ->get();

        $supplier = Supplier::get()->all();
        $db = dataBarang::get()->all();                     

        return view('Dashboard.Menu.barangMasuk', compact('bm', 'bmS', 'db', 'supplier'));
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
        barangMasuk::create([

            'kode_barang'=>$request->kode_barang,
            'kode_supplier'=>$request->kode_supplier,
            'stok'=>$request->stok


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
}