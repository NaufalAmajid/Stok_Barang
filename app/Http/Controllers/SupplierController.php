<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $daSu = Supplier::get()->all();

        return view('Dashboard.Menu.supplier', compact('daSu'));
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

        Supplier::create([

            'kode_supplier'=>$request->kode_supplier,
            'nama_supplier'=>$request->nama_supplier,
            'email'=>$request->email,
            'telephone'=>$request->telephone
            
        ]);

        return redirect('supplier')->with(['berhasil' => 'Supplier Berhasil Ditambahkan, Bernama ' . $request->nama_supplier]);
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
        $getID = Supplier::find($id);
        
        $getID->update([

            'kode_supplier'=>$request->kode_supplier,
            'nama_supplier'=>$request->nama_supplier,
            'email'=>$request->email,
            'telephone'=>$request->telephone

        ]);

        return redirect('supplier')->with(['edit' => 'Data milik ' . $request->nama_supplier .' berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getIDtoDelete = Supplier::find($id);
     $getIDtoDelete->delete();

     return redirect('supplier');
 }
}
