<?php

namespace App\Http\Controllers;

use App\Models\DetailResep;
use App\Models\Obat;
use App\Models\RawatJalan;
use App\Models\Resep;
use App\Models\Tindakan;
use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
    public function index()
    {
        $rawatJalan=RawatJalan::where('status', 'Pemeriksaan')->get();

        return view('pemeriksaan.index', [
            'rawatJalan' => $rawatJalan
        ]);
    }

    public function resepform($id)
    {
        $rawatJalan=RawatJalan::find($id);
        $tindakan=Tindakan::all();
        $obat=Obat::all();

        return view('pemeriksaan.form', [
            'rawatJalan'=>$rawatJalan,
            'tindakan'  => $tindakan,
            'obat' => $obat
        ]);
    }

    public function prosesResepForm(Request $request, $id)
    {
        $dataRawatJalan=[
            'tindakan_id' => $request->tindakan_id,
            'status' => 'Menunggu Pembayaran Resep'
        ];

        RawatJalan::where('id', $id)->update($dataRawatJalan);
        $resep=Resep::create([
            'rawat_jalan_id'  => $id
        ]);

        if ($request->has('obat_id')) {
            foreach ($request->obat_id as $obatId) {
                DetailResep::create([
                    'obat_id' => $obatId,
                    'resep_id' => $resep->id
                ]);
            }
        }

        return redirect()->route('pemeriksaan');
    }
}
