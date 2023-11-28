@extends('layouts.base')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu Antrian</h4>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <h5 class="card-header">Data Pasien</h5>
                <hr class="my-0" />
                <div class="card-body">
                    <form id="formAccountSettings">
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nama</label>
                                <input type="text" class="form-control" id="basic-default-fullname"
                                    placeholder="Masukkan Nama" name="name"
                                    value="{{ old('name', $rawatJalan->dataPasien->user->name) }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">NIK</label>
                                <input type="text" class="form-control" id="basic-default-fullname"
                                    placeholder="Masukkan NIK" name="nik"
                                    value="{{ old('nik', @$rawatJalan->dataPasien->nik) }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="basic-default-fullname"
                                    placeholder="Masukkan NIK" name="nik"
                                    value="{{ old('nik', @$rawatJalan->dataPasien->jenis_kelamin) }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Tempat Lahir</label>
                                <input type="text" class="form-control" id="basic-default-fullname"
                                    placeholder="Masukkan Tempat Lahir" name="tempat_lahir"
                                    value="{{ old('tempat_lahir', @$rawatJalan->dataPasien->tempat_lahir) }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="basic-default-fullname"
                                    name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir', @$rawatJalan->dataPasien->tanggal_lahir) }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Agama</label>
                                <input type="text" class="form-control" id="basic-default-fullname"
                                    placeholder="Masukkan NIK" name="nik"
                                    value="{{ old('nik', @$rawatJalan->dataPasien->agama) }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Pekerjaan</label>
                                <input type="text" class="form-control" id="basic-default-fullname"
                                    placeholder="Masukkan Pekerjaan" name="pekerjaan"
                                    value="{{ old('pekerjaan', @$rawatJalan->dataPasien->pekerjaan) }}"  readonly/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Telepon</label>
                                <input type="text" class="form-control" id="basic-default-fullname"
                                    placeholder="Masukkan Telepon" name="telepon"
                                    value="{{ old('telepon', @$rawatJalan->dataPasien->telepon) }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">No Hp/Whatsapp</label>
                                <input type="text" class="form-control" id="basic-default-fullname"
                                    placeholder="Masukkan No Hp/Whatsapp" name="no_hp"
                                    value="{{ old('no_hp', @$rawatJalan->dataPasien->no_hp) }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3" readonly>{{ @$rawatJalan->dataPasien->alamat }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Provinsi</label>
                                <input type="text" class="form-control" id="basic-default-fullname"
                                    placeholder="Masukkan NIK" name="nik"
                                    value="{{ old('nik', @$rawatJalan->dataPasien->provinsi->name) }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Kabupaten/Kota</label>
                                <input type="text" class="form-control" id="basic-default-fullname"
                                    placeholder="Masukkan NIK" name="nik"
                                    value="{{ old('nik', @$rawatJalan->dataPasien->kota->name) }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Kecamatan</label>
                                <input type="text" class="form-control" id="basic-default-fullname"
                                    placeholder="Masukkan NIK" name="nik"
                                    value="{{ old('nik', @$rawatJalan->dataPasien->kecamatan->name) }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Desa/Kelurahan</label>
                                <input type="text" class="form-control" id="basic-default-fullname"
                                    placeholder="Masukkan NIK" name="nik"
                                    value="{{ old('nik', @$rawatJalan->dataPasien->desa->name) }}" readonly />
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>

        </div>

        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Data Rawat Jalan</h5>
                <div class="card-body">
                  <div class="mb-3 col-12 mb-0">
                    <div class="alert alert-warning">
                      <h6 class="alert-heading fw-bold mb-1">Poli Yang Dipilih</h6>
                      <p class="mb-0">{{ $rawatJalan->poli->name }}</p>
                    </div>
                  </div>
                  <form id="formAccountDeactivation" method="POST" enctype="multipart/form-data" action="{{ route('fo-konfirmasi-antrian-pasien-proses', $rawatJalan) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">No Registrasi</label>
                        <input type="text" class="form-control" id="basic-default-fullname"
                            placeholder="Masukkan NIK" name="nik"
                            value="{{ $rawatJalan->no_register }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Biaya Pelayanan</label>
                        <input type="text" class="form-control" id="basic-default-fullname"
                            placeholder="Masukkan Biaya Pelayan Poli" name="biaya_pelayanan"
                            value="" />
                    </div>
                    <button type="submit" class="btn btn-danger deactivate-account">Konfirmasi</button>
                  </form>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection