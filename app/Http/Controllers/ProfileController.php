<?php

namespace App\Http\Controllers;

use App\Models\DataPasien;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Provinsi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dataPasien = DataPasien::where('user_id', $user->id)->first();

        $provinsi = Provinsi::all();
        $kota = Kota::all();
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        return view('profile.index', [
            'user' => $user,
            'dataPasien' => $dataPasien,
            'provinsi' => $provinsi,
            'kota' => $kota,
            'kecamatan' => $kecamatan,
            'desa' => $desa
        ]);
    }

    public function update(Request $request, $id)
    {
        $dataUser = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->password) {
            $dataUser['password'] = Hash::make($request->password);
        }

        $user = User::where('id', $id)->update($dataUser);

        if (Auth::user()->getRoleNames()[0] == 'pasien') {
            # code...
            $dataPasien = [
                'user_id' => $id,
                'provinsi_id' => $request->provinsi_id,
                'kota_id' => $request->kota_id,
                'kecamatan_id' => $request->kecamatan_id,
                'kelurahan_id' => $request->kelurahan_id,
                'desa_id' => $request->desa_id,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'telepon' => $request->telepon,
                'nik' => $request->nik,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan,
                'rt' => $request->rt,
                'rw' => $request->rw,
            ];

            DataPasien::updateOrCreate(
                ['user_id' => $id],
                $dataPasien
            );
        }

        return redirect()->route('home');
    }
}
