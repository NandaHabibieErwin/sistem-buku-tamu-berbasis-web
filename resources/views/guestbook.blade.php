<link href="{{ URL::asset('build/libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />

<!-- alertifyjs default themes  Css -->
<link href="{{ URL::asset('build/libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
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
                                        <input type="number" maxlength="15" class="form-control" id="validationCustom02"
                                            name="notelp" placeholder="08...." required>
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
                                            id="choices-single-default validationCustom04" placeholder="" required>
                                            <option disable selected value>Pilih Departement</option>
                                            @foreach ($data as $dept)
                                                <option value="{{ $dept->id_departement }}">{{ $dept->nama_departement }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Pilih salah satu departement yang akan dikunjungi
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom03">Waktu Kunjungan</label>
                                        <input type="datetime-local" class="form-control" id="validationCustom03"
                                            name="jadwal" placeholder="City" required>
                                        <div class="invalid-feedback">
                                            Masukkan waktu dengan benar
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom05">Tujuan</label>
                                        <textarea class="form-control" id="validationCustom05" placeholder="Tujuan..." name="tujuan" required></textarea>
                                        <div class="invalid-feedback">
                                            Jelaskan tujuan anda mengunjungi departemen
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
                            <button class="btn btn-primary" id="buttons" type="submit">Submit form</button>
                            <div class="spinner-border text-primary m-1" style="display: none;" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
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
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script>
            $(document).ready(function() {

                $('form').submit(function(e) {
                    e.preventDefault();
                    $('#buttons').hide();
                    $('.spinner-border').show();
                    // Get form data
                    var formData = new FormData(this);

                    $.ajax({
                        type: 'POST',
                        url: '{{ url('send-whatsapp') }}',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log(response);
                            $('#buttons').show();
                            $('.spinner-border').hide();
                            alertify.success('Berhasil, silahkan cek WA atau SMS anda');
                            $('form')[0].reset();
                        },
                        error: function(error) {
                            console.error(error);
                            $('#buttons').show();
                            $('.spinner-border').hide();
                            alertify.error('Gagal, coba lagi');
                        }
                    });
                });
            });
        </script>
    @endsection

    @section('css')
        <!-- alertifyjs Css -->
    @endsection
