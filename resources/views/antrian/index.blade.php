@extends('layouts.base')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            Menu Antrian
        </h4>
        <div class="card">
            <h5 class="card-header">Data Antrian</h5>
            <div class="table-responsive text-nowrap">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>No Antrian</th>
                            <th>Nama Pasien</th>
                            <th>Poli</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($rawatJalan as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->dataPasien->user->name }}</td>
                                <td>
                                    {{ $item->poli->name }}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('fo-konfirmasi-antrian-pasien', $item->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Konfirmasi
                                            </a>

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
