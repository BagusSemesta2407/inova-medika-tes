@extends('layouts.base')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <a href="user/create" class="btn btn-primary m-1 col-md-1 float-end">Tambah</a>
        <h4 class="fw-bold py-3 mb-4">
            Menu User
        </h4>
        <div class="card">
            <h5 class="card-header">Data User</h5>
            <div class="table-responsive text-nowrap">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($user as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @if ($item->getRoleNames()[0] == 'dokter')
                                        Dokter
                                    @elseif ($item->getRoleNames()[0] == 'pasien')
                                        Pasien
                                    @elseif ($item->getRoleNames()[0] == 'front_office')
                                        Front Office
                                    @elseif ($item->getRoleNames()[0] == 'kasir')
                                        Kasir
                                    @elseif ($item->getRoleNames()[0] == 'apoteker')
                                        Apoteker
                                    @else
                                        Tidak Memiliki Role
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('user.edit', $item->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item delete"
                                                data-url="{{ route('user.destroy', $item->id) }}"
                                                 href="#">
                                                <i class="bx bx-trash me-1"></i> Delete
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
