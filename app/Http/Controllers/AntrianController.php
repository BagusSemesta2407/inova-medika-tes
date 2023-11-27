<?php

namespace App\Http\Controllers;

use App\Models\RawatJalan;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index()
    {
        $rawatJalan=RawatJalan::where('status', 'Menunggu Antrian')->get();
        return view('antrian.index',[
            'rawatJalan' => $rawatJalan
        ]);
    }

    public function konfirmasiAntrian($id)
    {
        $rawatJalan=RawatJalan::find($id);
        return view('antrian.form', [
            'rawatJalan' => $rawatJalan
        ]);
    }

    public function prosesKonfirmasiAntrian(Request $request, $id)
    {
        $data=[
            'biaya_pelayanan' => $request->biaya_pelayanan,
            'status' => 'Menunggu Pembayaran Pelayanan'
        ];

        RawatJalan::where('id', $id)->update($data);

        return redirect()->route('fo-antrian');
    }
}
