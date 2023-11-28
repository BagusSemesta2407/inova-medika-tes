@extends('layouts.base')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Menu Rawat Jalan</h4>
        <div class="d-flex justify-content-beetwen">
            <div class="col-md-6 col-xl-4">
                <div class="card bg-primary text-white mb-3">
                    <div class="card-header">Antrian</div>
                    <div class="card-body">
                        @if (@$rawatJalan->status == 'Menunggu Antrian')
                            <h1 class="card-title text-white">{{ @$rawatJalan->id }}</h1>
                            <p class="card-text">Poli {{ @$rawatJalan->poli->name }}</p>
                            <small>Mohon Untuk Menunggu Antrian Yang Sudah Kami Sediakan</small>
                        @else
                            <h1 class="card-title text-white">-</h1>
                            <p class="card-text">Belum Ada Poli Yang Dituju</p>
                            <small>*) Silahkan Mendaftar Poli Untuk Melanjutkan Rawat Jalan</small>
                        @endif
                    </div>
                </div>
            </div>
            {{-- <div class="row mb-5"> --}}
            <div class="col-md ms-5">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img class="card-img card-img-left" src="https://source.unsplash.com/360x260?hospital"
                                alt="Card image" />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                @if (isset($rawatJalan) &&
                                        in_array($rawatJalan->status, [
                                            'Menunggu Pembayaran Pelayanan',
                                            'Pemeriksaan',
                                            'Menunggu Konfirmasi Kasir',
                                            'Menunggu Pembayaran Resep',
                                            'Menunggu Obat',
                                            'Menunggu Konfirmasi Pembayaran Resep'
                                        ]))
                                    <h5 class="card-title">No Register : {{ $rawatJalan->no_register }}</h5>
                                    <p>Poli Tujuan : {{ $rawatJalan->poli->name }}</p>
                                    <span class="badge bg-warning">Status : {{ $rawatJalan->status }}</span>
                                    @if ($rawatJalan->status == 'Menunggu Pembayaran Pelayanan')
                                        <div class="mt-3">
                                            <a href="{{ route('upload-bukti-pembayaran-poli', $rawatJalan->id) }}">Upload
                                                Bukti Pembayaran</a>
                                        </div>
                                        <small>*) Silahkan Lakukan Pembayaran Untuk Biaya Pelayanan</small>
                                    @elseif($rawatJalan->status == 'Menunggu Pembayaran Resep')
                                        <div class="mt-3">
                                            <a href="{{ route('pembayaran-resep', $rawatJalan->id) }}">Upload
                                                Bukti Pembayaran</a>
                                        </div>
                                        <small>*) Silahkan Lakukan Pembayaran Untuk Pengambilan Resep</small>
                                    @endif
                                @else
                                    <h5 class="card-title">No Register : -</h5>
                                    <p>Poli Tujuan : -</p>
                                    <p>Status : -</p>
                                    <small>*) Data Register Akan Tampil Ketika Anda Sudah Masuk Ke Proses
                                        Pemeriksaan</small>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- </div> --}}

        </div>
        {{-- 
            <div class="row mb-5">
            </div> --}}

        <!-- Text alignment -->
        <h5 class="pb-1 mb-4">Daftar Poli</h5>
        @if (isset($dataPasien))
            <div class="row mb-5">
                <div class="col-md-6 col-lg-4">
                    @forelse ($poli as $item)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                @if ($rawatJalan)
                                    <a hidden href="{{ route('daftar-rawat-jalan', $item->id) }}"
                                        class="btn btn-outline-primary mt-2">Daftar</a>
                                @else
                                    <a href="{{ route('daftar-rawat-jalan', $item->id) }}"
                                        class="btn btn-outline-primary mt-2">Daftar</a>
                                @endif
                            </div>
                        </div>
                    @empty
                        <small class="text-center">Belum Ada Poli</small>
                    @endforelse
                </div>
            </div>
        @else
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row">
                    <div class="col-lg-12 mb-4 order-0">
                        <div class="card">
                            <div class="d-flex align-items-end row">
                                <div class="col-sm-7">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">Selamat Datang {{ Auth::user()->name }} 🎉</h5>
                                        <p class="mb-4">
                                            Poli Tidak Dapat Ditampilkan Karena Anda Belum Mengisi Data Pribadi.
                                        </p>

                                        <a href="{{ route('profile') }}" class="btn btn-sm btn-outline-primary">Klik
                                            Disini</a>
                                    </div>
                                </div>
                                <div class="col-sm-5 text-center text-sm-left">
                                    <div class="card-body pb-0 px-0 px-md-4">
                                        <img src="{{ asset('asset/assets/img/illustrations/man-with-laptop-light.png') }}"
                                            height="140" alt="View Badge User"
                                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                            data-app-light-img="illustrations/man-with-laptop-light.png" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <!--/ Text alignment -->
    </div>
@endsection
