<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Kota;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function kota($id)
    {
        $kota=Kota::where('provinsi_id', $id)->get();

        return response()->json($kota);
    }

    public function kecamatan($id)
    {
        $kecamatan=Kecamatan::where('kota_id', $id)->get();

        return response()->json($kecamatan);
    }

    public function desa($id)
    {
        $desa=Desa::where('kecamatan_id', $id)->get();

        return response()->json($desa);
    }
}
