@extends('layouts.base')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            Menu Obat
        </h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Tambah Obat</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('obat.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nama</label>
                                <input type="text" class="form-control" id="basic-default-fullname"
                                    placeholder="Masukkan Nama" name="name" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Harga Obat</label>
                                <input type="text" class="form-control" id="basic-default-fullname"
                                    placeholder="Masukkan Harga Obat" name="harga" />
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
