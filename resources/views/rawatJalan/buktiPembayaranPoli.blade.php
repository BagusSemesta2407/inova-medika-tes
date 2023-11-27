@extends('layouts.base')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">Konfirmasi Data Pribadi</h5>
                    <div class="card-body">
                        <div class="mb-3 col-12 mb-0">
                            <div class="alert alert-warning">
                                <h6 class="alert-heading fw-bold mb-1">Poli Yang Dipilih</h6>
                                <p class="mb-0">{{ $rawatJalan->poli->name }}</p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Nominal Yang Harus Dibayar</label>
                            <input type="text" class="form-control" id="basic-default-fullname"
                                placeholder="Masukkan NIK" name="nik"
                                value="{{ old('nik', @$rawatJalan->biaya_pelayanan) }}" readonly />
                        </div>
                        <form id="formAccountDeactivation" method="POST" enctype="multipart/form-data" action="{{ route('upload-bukti-pembayaran-poli-proses', $rawatJalan) }}">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Nominal Yang Harus Dibayar</label>
                                <input type="file" class="form-control" id="basic-default-fullname"
                                    placeholder="Masukkan NIK" name="image"/>
                            </div>

                            <button type="submit" class="btn btn-danger deactivate-account">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
