@extends('layouts.master')
@section('title')
    Buku Tamu
@endsection

@section('page-title')
    Buku Tamu Dinas
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Buku Tamu</h4>
                        <p class="card-title-desc">Tuliskan data anda lalu pilih departement yang ingin dikunjungi, pesan
                            konfirmasi akan dikirim melalui WhatsApp atau SMS</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('send-whatsapp') }}" method="post" class="needs-validation" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Nama</label>
                                        <input type="text" class="form-control" id="validationCustom01"
                                            placeholder="Nama Lengkap" name="nama" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Masukkan nama anda
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom02">Nomor telepon</label>
                                        <input type="text" class="form-control" id="validationCustom02" name="notelp"
                                            placeholder="08...." required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Masukkan nomor telepon dengan benar
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom04">Departement</label>
                                        <select class="form-control" data-trigger name="dept"
                                            id="choices-single-default validationCustom04"
                                            placeholder="" required>
                                            <option disable selected value>Pilih Departement</option>
                                            <option value="Bidang Kesehatan Masyarakat Veteriner">Bidang Kesehatan Masyarakat Veteriner</option>
                                            <option value="Bidang Produksi Peternakan">Bidang Produksi Peternakan</option>
                                            <option value="Bidang Agribisnis Peternakan">Bidang Agribisnis Peternakan</option>
                                            <option value="Bidang Keuangan">Bidang Keuangan</option>
                                            <option value="Bidang Kepegawaian Umum">Bidang Kepegawaian Umum</option>
                                            <option value="Bidang Kesehatan Hewan">Bidang Kesehatan Hewan</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Pilih salah satu departement yang akan dikunjungi
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom05">Tujuan</label>
                                        <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" name="tujuan"
                                            required>
                                        <div class="invalid-feedback">
                                            Jelaskan tujuan anda mengunjungi departement
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom03">Waktu Kunjungan</label>
                                        <input type="datetime-local" class="form-control" id="validationCustom03" name="jadwal"
                                            placeholder="City" required>
                                        <div class="invalid-feedback">
                                            Masukkan waktu dengan benar
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" id="invalidCheck" type="radio" name="sendto"
                                                value="0" required>
                                            <label class="form-check-label" for="invalidCheck">Kirim konfirmasi ke
                                                Whatsapp</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="invalidCheck" name="sendto"
                                                value="1" required>
                                            <label class="form-check-label" for="invalidCheck">Kirim konfirmasi ke
                                                SMS</label>
                                            <div class="invalid-feedback">
                                                Pilih salah satu
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <button class="btn btn-primary" type="submit">Submit form</button>
                        </form>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
        <!-- alertifyjs js -->
        <script src="{{ URL::asset('build/libs/alertifyjs/build/alertify.min.js') }}"></script>
        <!-- notification init -->
        <script src="{{ URL::asset('build/js/pages/notification.init.js') }}"></script>
        <script src="{{ URL::asset('build/js/pages/form-advanced.init.js') }}"></script>
        <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection

    @section('css')
        <!-- alertifyjs Css -->
        <link href="{{ URL::asset('build/libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet"
            type="text/css" />

        <!-- alertifyjs default themes  Css -->
        <link href="{{ URL::asset('build/libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet"
            type="text/css" />
    @endsection
