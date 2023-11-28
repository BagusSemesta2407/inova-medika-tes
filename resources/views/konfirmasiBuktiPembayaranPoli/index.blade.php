@extends('layouts.base')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    @role('kasir')
    <h4 class="fw-bold py-3 mb-4">
        Menu Pembayaran
    </h4>
    @endrole
    @role('apoteker')
    <h4 class="fw-bold py-3 mb-4">
        Menu Pemberian Obat
    </h4>
    @endrole
    <div class="card">
        @role('kasir')
        <h5 class="card-header">Data Pembayaran</h5>
        @endrole
        @role('apoteker')
        <h5 class="card-header">Data Pemberian Obat</h5>
        @endrole

        <div class="table-responsive text-nowrap">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>No Register</th>
                        <th>Nama</th>
                        <th>Poli Tujuan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($rawatJalan as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->no_register }}</td>
                            <td>{{ $item->dataPasien->user->name }}</td>
                            <td>{{ $item->poli->name }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    @role('kasir')
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('form-pembayaran-poli', $item->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Konfirmasi</a>
                                    </div>
                                    @endrole
                                    @role('apoteker')
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('form-beri-obat', $item->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Konfirmasi</a>
                                    </div>
                                    @endrole
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