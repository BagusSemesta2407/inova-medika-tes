<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $poli=Poli::all();
        return view('poli.index', [
            'poli' => $poli
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('poli.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Poli::create([
            'name' => $request->name,
        ]);

        return redirect()->route('poli.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Poli $poli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poli $poli)
    {
        $poli=Poli::find($poli->id);

        return view('poli.edit', [
            'poli' => $poli
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Poli $poli)
    {
        $data=[
            'name' => $request->name,
        ];

        Poli::where('id', $poli->id)->update($data);

        return redirect()->route('poli.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $poli=Poli::find($id);

        $poli->delete();

        return response()->json(['success', 'Data Berhasil Dihapus']);
    }
}
