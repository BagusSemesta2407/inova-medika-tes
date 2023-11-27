<?php

use App\Http\Controllers\AntrianController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RawatJalanController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('user', UserController::class);
    
    Route::resource('poli', PoliController::class);
    Route::resource('tindakan', TindakanController::class);
    Route::resource('obat', ObatController::class);

    //laman pasien
    Route::get('rawat-jalan', [RawatJalanController::class, 'index'])->name('rawat-jalan.index');
    Route::get('rawat-jalan/daftar/{poliId}', [RawatJalanController::class, 'daftarRawatJalan'])->name('daftar-rawat-jalan');
    Route::post('rawat-jalan/daftar/{poliId}', [RawatJalanController::class, 'processDaftarRawatJalan'])->name('proses-daftar-rawat-jalan');

    //laman front office (antrian)
    Route::get('fo-antrian', [AntrianController::class, 'index'])->name('fo-antrian');
    Route::get('fo-konfirmasi-antrian-pasien/{id}', [AntrianController::class, 'konfirmasiAntrian'])->name('fo-konfirmasi-antrian-pasien');
    Route::post('fo-konfirmasi-antrian-pasien/{id}', [AntrianController::class, 'prosesKonfirmasiAntrian'])->name('fo-konfirmasi-antrian-pasien-proses');

    //Upload Bukti Pembayaran
    Route::get('upload-bukti-pembayaran-poli/{id}', [RawatJalanController::class, 'indexUploadBuktiPembayaranPoli'])->name('upload-bukti-pembayaran-poli');
    Route::post('upload-bukti-pembayaran-poli/{id}', [RawatJalanController::class, 'prosesIndexUploadBuktiPembayaranPoli'])->name('upload-bukti-pembayaran-poli-proses');

    //laman profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile/{id}', [ProfileController::class, 'update'])->name('profile-update');

    //laman tindakan dan resep
    Route::get('pemeriksaan', [PemeriksaanController::class, 'index'])->name('pemeriksaan');
    Route::get('pemeriksaan/tindakan-resep/{id}', [PemeriksaanController::class, 'resepform'])->name('resep-form');
    Route::post('pemeriksaan/tindakan-resep/{id}', [PemeriksaanController::class, 'prosesResepForm'])->name('resep-form-proses');
    // getwilayah
    Route::get('kota/{kotaId?}', [RegionController::class, 'kota'])->name('kota');
    Route::get('kecamatan/{kecamatanId?}', [RegionController::class, 'kecamatan'])->name('kecamatan');
    Route::get('desa/{desaId?}', [RegionController::class, 'desa'])->name('desa');
});