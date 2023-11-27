@extends('layouts.base')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            Menu User
        </h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Tambah User</h5>
                        <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('user.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nama</label>
                                <input type="text" class="form-control" id="basic-default-fullname"
                                    placeholder="Masukkan Nama" name="name" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-email">Email</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-default-email" class="form-control"
                                        placeholder="Masukkan Email" name="email" />
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Role</label>
                                <select name="roles" class="form-select" id="exampleFormControlSelect1"
                                    aria-label="Default select example">
                                    <option value="" disabled selected>Pilih Role</option>
                                    @foreach ($role as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('roles', @$user->id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-password-toggle mb-3">
                                <label class="form-label" for="basic-default-password12">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="basic-default-password12"
                                        placeholder="...." aria-describedby="basic-default-password2" name="password" />
                                    <span id="basic-default-password2" class="input-group-text cursor-pointer"><i
                                            class="bx bx-hide"></i></span>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
