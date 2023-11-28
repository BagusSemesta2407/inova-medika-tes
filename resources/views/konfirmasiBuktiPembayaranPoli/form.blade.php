@extends('layouts.base')

@section('content')

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
            integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async>
        </script>
    </head>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Menu Pembayaran</h4>

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
                            <small class="text-muted">*) Cek Data Diri Anda Sebelum Mendaftar</small>
                            <div>
                                <a href="{{ route('profile') }}">Klik Disini Jika Igin Merubah Data Diri Anda</a>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>

            </div>

            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-header">Konfirmasi Pembayaran</h5>
                    <div class="card-body">
                        <div class="mb-3 col-12 mb-0">
                            <div class="alert alert-warning">
                                <h6 class="alert-heading fw-bold mb-1">Poli Yang Dipilih</h6>
                                <p class="mb-0">{{ $rawatJalan->poli->name }}</p>
                            </div>
                        </div>

                        <div class="mb-3" data-masonry='{"percentPosition": true }'>
                            <label for="exampleFormControlSelect1" class="form-label">No Register</label>
                            <input type="text" class="form-control" id="basic-default-fullname"
                                placeholder="Masukkan NIK" name="nik"
                                value="{{ old('nik', @$rawatJalan->no_register) }}" readonly />
                        </div>
                        @if ($rawatJalan->status == 'Menunggu Konfirmasi Kasir')
                            <div class="mb-3" data-masonry='{"percentPosition": true }'>
                                <label for="exampleFormControlSelect1" class="form-label">Biaya Pelayanan</label>
                                <input type="text" class="form-control" id="basic-default-fullname"
                                    placeholder="Masukkan NIK" name="nik"
                                    value="{{ old('nik', @$rawatJalan->biaya_pelayanan) }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Bukti Pembayaran</label>
                                <a href="{{ @$rawatJalan->image_url }}" data-fancybox="gallery"
                                    data-caption="{{ @$rawatJalan->caption }}">
                                    <img src="{{ @$rawatJalan->image_url }}" class="d-block rounded" width="200"
                                        alt="">

                                </a>
                            </div>
                        @endif
                        @if ($rawatJalan->status == 'Menunggu Konfirmasi Pembayaran Resep' || $rawatJalan->status == 'Menunggu Obat')
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Tindakan</label>
                                <p>{{ $rawatJalan->tindakan->name }}</p>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Jenis Resep Yang
                                    Diberikan</label>
                                <ul>
                                    @foreach ($detailResep as $item)
                                        <li>
                                            {{ $item->obat->name }} (Rp.{{ $item->obat->harga }})
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <hr>
                            <p>
                                <b>
                                    Total Yang Harus Dibayarkan : Rp.{{ $totalHarga }}
                                </b>
                            </p>
                            @role('kasir')
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Bukti Pembayaran</label>
                                    <a href="{{ @$resep->image_url }}" data-fancybox="gallery"
                                        data-caption="{{ @$resep->caption }}">
                                        <img src="{{ @$resep->image_url }}" class="d-block rounded" width="200"
                                            alt="">

                                    </a>
                                </div>
                            @endrole
                        @endif
                        <form id="formAccountDeactivation" method="POST" enctype="multipart/form-data"
                            action="{{ route('proses-form-pembayaran-poli', $rawatJalan) }}">
                            @csrf
                            @if ($rawatJalan->status == 'Menunggu Konfirmasi Kasir')
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Konfirmasi Pembayaran</label>
                                    <select id="country" class="select2 form-select" name="status">
                                        <option value="" selected disabled>Pilih Konfirmasi</option>
                                        <option value="Pemeriksaan"
                                            {{ old('status', @$rawatJalan->status) === 'Pemeriksaan' ? 'selected' : '' }}>
                                            Konfirmasi Bukti Pembayaran</option>
                                        <option value="Menunggu Pembayaran Pelayanan"
                                            {{ old('status', @$rawatJalan->status) === 'Menunggu Pembayaran Pelayanan' ? 'selected' : '' }}>
                                            Pasien Upload Ulang Bukti Pembayaran</option>
                                    </select>
                                </div>
                            @endif

                            @if ($rawatJalan->status == 'Menunggu Konfirmasi Pembayaran Resep')
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Konfirmasi Pembayaran</label>
                                    <select id="country" class="select2 form-select" name="status">
                                        <option value="" selected disabled>Pilih Konfirmasi</option>
                                        <option value="Menunggu Obat"
                                            {{ old('status', @$rawatJalan->status) === 'Menunggu Obat' ? 'selected' : '' }}>
                                            Konfirmasi Bukti Pembayaran Resep</option>
                                        <option value="Menunggu Pembayaran Resep"
                                            {{ old('status', @$rawatJalan->status) === 'Menunggu Pembayaran Resep' ? 'selected' : '' }}>
                                            Pasien Upload Ulang Bukti Pembayaran Resep</option>
                                    </select>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-danger deactivate-account">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('[data-fancybox="gallery"]').fancybox();
        });
    </script>
@endsection
