@extends('layouts.base')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile</h4>

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
                                        value="{{ old('tempat_lahir', @$rawatJalan->dataPasien->tempat_lahir) }}"
                                        readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="basic-default-fullname"
                                        name="tanggal_lahir"
                                        value="{{ old('tanggal_lahir', @$rawatJalan->dataPasien->tanggal_lahir) }}"
                                        readonly />
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
                                        value="{{ old('pekerjaan', @$rawatJalan->dataPasien->pekerjaan) }}" readonly />
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
                    <h5 class="card-header">Form Tindakan & Resep</h5>
                    <div class="card-body">
                        <div class="mb-3 col-12 mb-0">
                            <div class="alert alert-warning">
                                <h6 class="alert-heading fw-bold mb-1">Poli Yang Dipilih</h6>
                                <p class="mb-0">{{ $rawatJalan->poli->name }}</p>
                                <p class="mb-0">No Register : {{ $rawatJalan->no_register }}</p>
                            </div>
                        </div>
                        <form id="formAccountDeactivation" method="POST" enctype="multipart/form-data" action="{{ route('resep-form-proses', $rawatJalan) }}">
                            @csrf

                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Tindakan</label>
                                <select name="tindakan_id" class="form-select" id="exampleFormControlSelect1"
                                    aria-label="Default select example">
                                    <option value="" disabled selected>Pilih Tindakan</option>
                                    @foreach ($tindakan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('tindakan_id', @$rawatJalan->id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Obat</label>
                                <ul class="list-group">
                                    @forelse ($obat as $item)
                                        <li class="list-group-item">
                                            <input type="checkbox" class="form-check-input" name="obat_id[]"
                                                value="{{ $item->id }}"
                                                {{ in_array($item->id, old('obat_id', @$obat_ids ?? [])) ? 'checked' : '' }}>
                                            {{ $item->name }}
                                        </li>
                                    @empty
                                        <li class="list-group-item"><i>Tidak Ada Obat</i></li>
                                    @endforelse
                                </ul>
                            </div>

                            <button type="submit" class="btn btn-danger deactivate-account">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
