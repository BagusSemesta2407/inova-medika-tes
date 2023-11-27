<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../asset/assets/" data-template="vertical-menu-template-free">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('asset/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('asset/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('asset/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('asset/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('asset/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('asset/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('asset/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('asset/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('asset/assets/js/config.js') }}"></script>

    {{-- datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @if (Auth::user()->getRoleNames()[0] != 'pasien')
                @include('layouts.sidebar')
            @endif

            <!-- Layout container -->
            <div class="layout-page">
                @include('layouts.navbar')

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->



                    @yield('content')
                    <!-- / Content -->

                    @include('layouts.footer')

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('asset/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('asset/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('asset/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('asset/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('asset/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('asset/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('asset/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('asset/assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.delete', function() {
            var url = $(this).data('url');
            var icon = 'question';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            Swal.fire({
                title: 'Apakah Anda Yakin Ingin Menghapus?',
                text: 'Data akan terhapus secara permanen',
                icon: icon,
                showCancelButton: true
            }).then((action) => {
                if (action.isConfirmed) {
                    console.log(action);
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        dataType: 'json',
                        success: function(data) {
                            Swal.fire('Berhasil', 'Data Berhasil Dihapus', 'success')
                                .then(function() {
                                    location.reload();
                                })
                        },
                        error: function(data) {
                            console.log('Error :' + data);
                        }
                    })
                }
            })
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

<script>
    // Json Get Kota
    function getCity(provId, oldValue = null, cityId = null) {
        $('#kota_id').removeAttr('disabled');

        $.ajax({
            type: 'GET',
            url: "{{ route('kota') }}" + "/" + provId,
            dataType: 'json',
            success: function(data) {
                $('select[name="kota_id"]').empty();
                $('select[name="kecamatan_id"]').empty();
                $('select[name="desa_id"]').empty();
                $('select[name="kota_id"]').append(`
                    <option disabled selected>
                        Pilih Kota / Kabupaten
                    </option>
                    `);

                $.each(data, function(key, value) {
                    if ((oldValue ? oldValue.kotas_id : cityId) == value.id) {
                        $('select[name="kota_id"]').append(`
                            <option value="${value.id}" selected>
                                ${value.name}
                            </option>
                        `);
                    } else {
                        $('select[name="kota_id"]').append(`
                        <option value="${value.id}">
                            ${value.name}
                        </option>`);
                    }
                });

                let oldValueDistrict        = {!! json_encode(old('kecamatan_id')) !!}

                if (oldValue ? oldValue.kota_id : cityId) {
                    getDistricts(oldValue ? oldValue.kota_id : cityId, oldValue, oldValueDistrict)
                }
            },
            error: function(data) {
                console.log('Error :' + data);
            }
        })
    }

    // Json Get Kecamatan
    function getDistricts(cityId, oldValue = null, districtId = null) {
        $('#kecamatan_id').removeAttr('disabled');

        $.ajax({
            type: 'GET',
            url: "{{ route('kecamatan') }}" + "/" + cityId,
            dataType: 'json',
            success: function(data) {
                $('select[name="kecamatan_id"]').empty();
                $('select[name="desa_id"]').empty();
                $('select[name="kecamatan_id"]').append(
                    '<option disabled selected>Pilih Kecamatan</option>');
                $.each(data, function(key, value) {
                    if ((oldValue ? oldValue.kecamatan_id : districtId) == value.id) {
                        $('select[name="kecamatan_id"]').append('<option value="' +
                            value.id + '" selected>' + value.name + '</option>');
                    } else {
                        $('select[name="kecamatan_id"]').append('<option value="' +
                            value.id + '">' + value.name + '</option>');
                    }
                });

                let oldValueVillage         = {!! json_encode(old('desa_id')) !!}

                if (oldValue ? oldValue.kecamatan_id : districtId) {
                    getVillages(oldValue ? oldValue.kecamatan_id : districtId, oldValue, oldValueVillage)
                }
            },
            error: function(data) {
                console.log('Error :' + data);
            }
        })
    }

    // Json Get Kelurahan
    function getVillages(districtId,oldValue = null, villagesId = null) {
        $('#desa_id').removeAttr('disabled');

        $.ajax({
            type: 'GET',
            url: "{{ route('desa') }}" + "/" + districtId,
            dataType: 'json',
            success: function(data) {
                $('select[name="desa_id"]').empty();
                $('select[name="desa_id"]').append(
                    '<option disabled selected>Pilih Desa</option>');
                $.each(data, function(key, value) {
                    if ((oldValue ? oldValue.desa_id : villagesId) == value.id) {
                        $('select[name="desa_id"]').append('<option value="' +
                            value.id + '"selected>' + value.name + '</option>');
                    } else {
                        $('select[name="desa_id"]').append('<option value="' +
                            value.id + '">' + value.name + '</option>');
                    }
                });
            },
            error: function(data) {
                console.log('Error :' + data);
            }
        })
    }
</script>


    @yield('script')
</body>

</html>
