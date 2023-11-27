@extends('layouts.base')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" enctype="multipart/form-data"
                            action="{{ route('profile-update', $user) }}">
                            {{-- @method('PUT') --}}
                            @csrf
                            <div class="row">
                                <p>Data Login</p>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Nama</label>
                                    <input type="text" class="form-control" id="basic-default-fullname"
                                        placeholder="Masukkan Nama" name="name" value="{{ old('name', $user->name) }}" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-email">Email</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="basic-default-email" class="form-control"
                                            placeholder="Masukkan Email" name="email"
                                            value="{{ old('email', $user->email) }}" />
                                    </div>
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
                                @if (Auth::user()->getRoleNames()[0] == 'pasien')
                                    
                                <p>Data Pasien</p>
                                <small class="text-muted">Inputkan Data Diri Sesuai Data KTP</small>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">NIK</label>
                                    <input type="text" class="form-control" id="basic-default-fullname"
                                        placeholder="Masukkan NIK" name="nik"
                                        value="{{ old('nik', @$dataPasien->nik) }}" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Jenis Kelamin</label>
                                    <select id="country" class="select2 form-select" name="jenis_kelamin">
                                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki"
                                            {{ old('Laki-laki', @$dataPasien->jenis_kelamin) === 'Laki-laki' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="Perempuan"
                                            {{ old('Perempuan', @$dataPasien->jenis_kelamin) === 'Perempuan' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="basic-default-fullname"
                                        placeholder="Masukkan Tempat Lahir" name="tempat_lahir"
                                        value="{{ old('tempat_lahir', @$dataPasien->tempat_lahir) }}" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="basic-default-fullname"
                                        name="tanggal_lahir"
                                        value="{{ old('tanggal_lahir', @$dataPasien->tanggal_lahir) }}" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Agama</label>
                                    <select id="country" class="select2 form-select" name="agama">
                                        <option value="">Select</option>
                                        <option value="Islam"
                                            {{ old('agama', @$dataPasien->agama) == 'Islam' ? 'selected' : '' }}>Islam
                                        </option>
                                        <option value="Kristen"
                                            {{ old('agama', @$dataPasien->agama) == 'Kristen' ? 'selected' : '' }}>Kristen
                                        </option>
                                        <option value="Hindu"
                                            {{ old('agama', @$dataPasien->agama) == 'Hindu' ? 'selected' : '' }}>Hindu
                                        </option>
                                        <option value="Buddha"
                                            {{ old('agama', @$dataPasien->agama) == 'Buddha' ? 'selected' : '' }}>Buddha
                                        </option>
                                        <option value="Konghucu"
                                            {{ old('agama', @$dataPasien->agama) == 'Konghucu' ? 'selected' : '' }}>
                                            Konghucu</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Pekerjaan</label>
                                    <input type="text" class="form-control" id="basic-default-fullname"
                                        placeholder="Masukkan Pekerjaan" name="pekerjaan"
                                        value="{{ old('pekerjaan', @$dataPasien->pekerjaan) }}" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Telepon</label>
                                    <input type="text" class="form-control" id="basic-default-fullname"
                                        placeholder="Masukkan Telepon" name="telepon"
                                        value="{{ old('telepon', @$dataPasien->telepon) }}" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">No Hp/Whatsapp</label>
                                    <input type="text" class="form-control" id="basic-default-fullname"
                                        placeholder="Masukkan No Hp/Whatsapp" name="no_hp"
                                        value="{{ old('no_hp', @$dataPasien->no_hp) }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3">{{ @$dataPasien->alamat }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Provinsi</label>
                                    <select name="provinsi_id" class="form-select" id="kota_id"
                                        aria-label="Default select example">
                                        <option value="" disabled selected>Pilih Provinsi</option>
                                        @foreach ($provinsi as $province)
                                            <option value="{{ $province->id }}"
                                                {{ old('provinsi_id', @$dataPasien->provinsi_id) == $province->id ? 'selected' : '' }}>
                                                {{ $province->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Kabupaten/Kota</label>
                                    <select name="kota_id" class="form-select" id="kota_id"
                                        aria-label="Default select example">
                                        <option value="" disabled selected>Pilih Kabupaten/Kota</option>
                                        {{-- @foreach ($role as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('roles', @$user->id) == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Kecamatan</label>
                                    <select name="kecamatan_id" class="form-select" id="kecamatan_id"
                                        aria-label="Default select example">
                                        <option value="" disabled selected>Pilih Kecamatan</option>
                                        {{-- @foreach ($role as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('roles', @$user->id) == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Desa/Kelurahan</label>
                                    <select name="desa_id" class="form-select" id="desa_id"
                                        aria-label="Default select example">
                                        <option value="" disabled selected>Pilih Desa/Kelurahan</option>
                                        {{-- @foreach ($role as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('roles', @$user->id) == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                @endif

                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {

            if ($('select[name="provinsi_id"]').val()) {
                let provinceId = $('select[name="provinsi_id"]').val();
                let oldValue = {!! json_encode(old('kota_id')) !!}

                getCity(provinceId, oldValue);
            }

            $('select[name="provinsi_id"]').on('change', function() {
                let prov = $(this).val();
                let kotaId = $('select[name="kota_id"]').val()
                console.log(kotaId);

                getCity(prov, kotaId);
            });

            $('select[name="kota_id"]').on('change', function() {
                var kab = $(this).val();
                let kecamatanId = $('select[name="kecamatan_id"]').val();

                getDistricts(kab, kecamatanId);
            });

            $('select[name="kecamatan_id"]').on('change', function() {
                var kec = $(this).val();
                let kelurahanId = $('select[name="desa_id"]').val();

                getVillages(kec, kelurahanId);
            });
        });
    </script>
@endsection
