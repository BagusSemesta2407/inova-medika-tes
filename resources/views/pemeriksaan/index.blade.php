@extends('layouts.base')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    {{-- <a href="poli/create" class="btn btn-primary m-1 col-md-1 float-end">Tambah</a> --}}
    <h4 class="fw-bold py-3 mb-4">
        Menu Pemeriksaan
    </h4>
    <div class="card">
        <h5 class="card-header">Data Pemeriksaan</h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>No REGISTRASI</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($rawatJalan as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->no_register }}</td>
                            <td>{{ $item->dataPasien->user->name }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('resep-form', $item->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection