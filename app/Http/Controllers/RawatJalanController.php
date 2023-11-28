<?php

namespace App\Http\Controllers;

use App\Models\DataPasien;
use App\Models\DetailResep;
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
        $poli = Poli::all();
        $auth = Auth::user()->id;
        $dataPasien = DataPasien::where('user_id', $auth)->first();
        $rawatJalan = RawatJalan::where('data_pasien_id', @$dataPasien->id)->first();

        return view('rawatJalan.index', [
            'poli' => $poli,
            'dataPasien' => $dataPasien,
            'rawatJalan' => $rawatJalan
        ]);
    }

    public function daftarRawatJalan($id)
    {
        $poli = Poli::find($id);
        $auth = Auth::user()->id;
        $dataPasien = DataPasien::where('user_id', $auth)->first();
        return view('rawatJalan.form', [
            'poli' => $poli,
            'dataPasien' => $dataPasien
        ]);
    }

    public function processDaftarRawatJalan(Request $request, $id)
    {
        $auth = Auth::user()->id;
        $dataPasien = DataPasien::where('user_id', $auth)->first();

        $data = [
            'poli_id' => $id,
            'data_pasien_id' => $dataPasien->id,
            'no_register' => $dataPasien->id . $id . RawatJalan::count() + 1,
            'status' => 'Menunggu Antrian'
        ];

        RawatJalan::create($data);

        return redirect()->route('rawat-jalan.index');
    }


    public function indexUploadBuktiPembayaranPoli($id)
    {
        $rawatJalan = RawatJalan::find($id);


        return view('rawatJalan.buktiPembayaranPoli', [
            'rawatJalan' => $rawatJalan
        ]);
    }
    public function prosesIndexUploadBuktiPembayaranPoli(Request $request, $id)
    {
        $data = [
            'status' => 'Menunggu Konfirmasi Kasir'
        ];

        $image = RawatJalan::saveImage($request);

        if ($image) {
            $data['image'] = $image;
            RawatJalan::deleteImage($id);
        }

        RawatJalan::where('id', $id)->update($data);

        return redirect()->route('rawat-jalan.index');
    }

    public function informasiPembayaranPelayanan()
    {
        $rawatJalan = RawatJalan::where('status', 'Pemeriksaan')->get();

        return view('rawatJalan.informasipembayaranpoli.', [
            'rawatJalan' => $rawatJalan
        ]);
    }

    public function konfirmasiBuktiPembayaranPoli()
    {
        $rawatJalan = RawatJalan::get();
        return view('konfirmasiBuktiPembayaranPoli.index', [
            'rawatJalan' => $rawatJalan
        ]);
    }


    public function formKonfirmasiBuktiPembayaranPoli($id)
    {
        $rawatJalan = RawatJalan::find($id);
        $resep = Resep::where('rawat_jalan_id', $rawatJalan->id)->first();
        $detailResep = DetailResep::where('resep_id', $resep->id)
            ->join('obats', 'detail_reseps.obat_id', '=', 'obats.id')
            ->select('detail_reseps.*', 'obats.harga as harga_obat')
            ->get();

        $totalHarga = $detailResep->sum('harga_obat');

        return view('konfirmasiBuktiPembayaranPoli.form', [
            'rawatJalan' => $rawatJalan,
            'detailResep' => $detailResep,
            'totalHarga' => $totalHarga,
            'resep' => $resep
        ]);
    }

    public function prosesFormKonfirmasiBuktiPembayaranPoli(Request $request, $id)
    {
        $data = [
            'status' => $request->status
        ];

        if (Auth::user()->getRoleNames()[0] == 'apoteker') {
            $data = [
                'status' => 'Selesai'
            ];
        }

        RawatJalan::where('id', $id)->update($data);

        return redirect()->route('pembayaran-poli');
    }

    public function pembayaranResepForm($id)
    {
        $rawatJalan = RawatJalan::find($id);
        $resep = Resep::where('rawat_jalan_id', $rawatJalan->id)->first();
        $detailResep = DetailResep::where('resep_id', $resep->id)
            ->join('obats', 'detail_reseps.obat_id', '=', 'obats.id')
            ->select('detail_reseps.*', 'obats.harga as harga_obat')
            ->get();

        $totalHarga = $detailResep->sum('harga_obat');

        return view('rawatJalan.pembayaranResep', [
            'rawatJalan' => $rawatJalan,
            'detailResep' => $detailResep,
            'totalHarga' => $totalHarga
        ]);
    }

    public function prosesPembayaranResep(Request $request, $id)
    {
        $dataRawatJalan = [
            'status' => 'Menunggu Konfirmasi Pembayaran Resep'
        ];

        $rawatJalan = RawatJalan::where('id', $id)->update($dataRawatJalan);

        $image = Resep::saveImage($request);
        if ($image) {
            $data['image'] = $image;
            Resep::deleteImage($id);
        }

        Resep::where('rawat_jalan_id', $id)->update($data);


        return redirect()->route('rawat-jalan.index');
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
