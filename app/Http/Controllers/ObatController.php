<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obat=Obat::all();

        return view('obat.index', [
            'obat'=> $obat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('obat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Obat::create([
            'name' => $request->name,
            'harga' => $request->harga,
        ]);

        return redirect()->route('obat.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $obat=Obat::find($id);

        return view('obat.edit', [
            'obat'=>$obat
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data=[
            'name' => $request->name,
            'harga' => $request->harga,
        ];

        Obat::where('id', $id)->update($data);
        return redirect()->route('obat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $obat=Obat::find($id);

       $obat->delete();

       return response()->json(['success', 'Data Berhasil Dihapus']);
    }
}
