@extends('layouts.base')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            Menu Poli
        </h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Poli</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('poli.update', $poli) }}">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nama</label>
                                <input type="text" class="form-control" id="basic-default-fullname"
                                    placeholder="Masukkan Nama" name="name" value="{{ old('name', $poli->name) }}" />
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
