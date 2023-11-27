<?php

namespace App\Http\Controllers;

use App\Models\DataPasien;
use App\Models\Poli;
use App\Models\RawatJalan;
use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RawatJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $poli=Poli::all();
        $auth=Auth::user()->id;
        $dataPasien=DataPasien::where('user_id', $auth)->first();
        $rawatJalan=RawatJalan::where('data_pasien_id', @$dataPasien->id)->first();

        return view('rawatJalan.index', [
            'poli' => $poli,
            'dataPasien' => $dataPasien,
            'rawatJalan' => $rawatJalan
        ]);
    }

    public function daftarRawatJalan($id)
    {
        $poli=Poli::find($id);
        $auth=Auth::user()->id;
        $dataPasien=DataPasien::where('user_id', $auth)->first();
        return view('rawatJalan.form', [
            'poli' => $poli,
            'dataPasien' => $dataPasien
        ]);
    }

    public function processDaftarRawatJalan(Request $request, $id)
    {
        $auth=Auth::user()->id;
        $dataPasien=DataPasien::where('user_id', $auth)->first();

        $data=[
            'poli_id' => $id,
            'data_pasien_id' => $dataPasien->id,
            'no_register' => $dataPasien->id . $id . RawatJalan::count()+1,
            'status' => 'Menunggu Antrian'
        ];

        RawatJalan::create($data);

        return redirect()->route('rawat-jalan.index');
    }

    
    public function indexUploadBuktiPembayaranPoli($id)
    {
        $rawatJalan=RawatJalan::find($id);

        return view('rawatJalan.buktiPembayaranPoli', [
            'rawatJalan' => $rawatJalan
        ]);
    }
    public function prosesIndexUploadBuktiPembayaranPoli(Request $request, $id)
    {
        $data = [
            'status' => 'Pemeriksaan'
        ];

        $image=RawatJalan::saveImage($request);
        
        if ($image) {
            $data['image']=$image;
            RawatJalan::deleteImage($id);
        }

        RawatJalan::where('id', $id)->update($data);

        return redirect()->route('rawat-jalan.index');
    }

    public function informasiPembayaranPelayanan()
    {
        $rawatJalan=RawatJalan::where('status', 'Pemeriksaan')->get();

        return view('rawatJalan.informasipembayaranpoli.', [
            'rawatJalan' => $rawatJalan
        ]);
    }

   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RawatJalan $rawatJalan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RawatJalan $rawatJalan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RawatJalan $rawatJalan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RawatJalan $rawatJalan)
    {
        //
    }
}
