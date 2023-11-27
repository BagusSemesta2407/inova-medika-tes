<?php

namespace App\Http\Controllers;

use App\Models\Tindakan;
use Illuminate\Http\Request;

class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tindakan=Tindakan::all();

        return view('tindakan.index', [
            'tindakan' => $tindakan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tindakan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Tindakan::create([
            'name' => $request->name,
        ]);

        return redirect()->route('tindakan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tindakan $tindakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tindakan=Tindakan::find($id);

        return view('tindakan.edit', [
            'tindakan' => $tindakan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data=[
            'name' => $request->name,
        ];

        Tindakan::where('id', $id)->update($data);

        return redirect()->route('tindakan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tindakan=Tindakan::find($id);

        $tindakan->delete();

        return response()->json(['success', 'Data Berhasil Dihapus']);
    }
}
