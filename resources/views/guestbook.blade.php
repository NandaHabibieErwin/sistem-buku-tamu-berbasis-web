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
                        <form action="{{ url('send-whatsapp') }}" method="post" enctype="multipart/form-data"
                            class="needs-validation" novalidate>
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
                                <style>
                                    input[type="number"] {
                                        -moz-appearance: textfield;
                                        /* Firefox */
                                    }

                                    input[type="number"]::-webkit-inner-spin-button,
                                    input[type="number"]::-webkit-outer-spin-button {
                                        -webkit-appearance: none;
                                        margin: 0;
                                    }
                                </style>
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
                            <script>
                                // Get the current date and time in the format expected by datetime-local input
                                const currentDate = new Date().toISOString().slice(0, 16);

                                // Set the min attribute of the datetime input
                                document.getElementById('validationCustom03').min = currentDate;
                            </script>
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
                                            <input class="form-check-input" id="whatsappCheck" type="radio" name="sendto"
                                                value="0" required>
                                            <label class="form-check-label" for="whatsappCheck">Kirim konfirmasi ke
                                                Whatsapp</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="smsCheck" type="radio" name="sendto"
                                                value="1" required>
                                            <label class="form-check-label" for="smsCheck">Kirim konfirmasi ke SMS</label>
                                            <div class="invalid-feedback">
                                                Pilih salah satu
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="noVerificationCheck" type="radio"
                                                name="sendto" value="5" required>
                                            <label class="form-check-label" for="noVerificationCheck">Tanpa
                                                Verifikasi</label>
                                            <div class="invalid-feedback">
                                                Pilih salah satu
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <button type="button" data-bs-toggle="modal" id="FotoTamuButton"
                                            data-bs-target="#FotoTamu"
                                            class="btn
                                            btn-outline-danger waves-effect btn-label waves-light"><i
                                                class="fa fa-camera"></i>
                                            Scan Wajah</button>
                                        <!--  <div id="results"></div> -->
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="FotoTamu" tabindex="-1" role="dialog"
                                aria-labelledby="orderdetailsModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="orderdetailsModalLabel">Pastikan wajah ditengah
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center align-items-center">
                                            <div id="my_camera" style="position: relative;">
                                                <div id="center-indicator"
                                                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                </div>
                                            </div>
                                            <input type="hidden" name="foto" id="validationCustom06"
                                                class="image-tag">
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-info" data-bs-dismiss="modal"
                                                value="Foto" id="capture" onClick="take_snapshot()">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- end modal -->

                            <input type="reset" class="btn btn-danger w-md" id="buttones"
                                onclick="resetButtonClicked()" type="submit">
                            <button class="btn btn-primary w-md" id="buttons" type="submit">Kirim</button>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
        <script language="JavaScript"></script>
        <script>
            Webcam.set({
                width: 490,
                height: 350,
                image_format: 'jpeg',
                jpeg_quality: 90
            });

            Webcam.attach('#my_camera');

            function take_snapshot() {
                Webcam.snap(function(data_uri) {
                    $(".image-tag").val(data_uri);
                    $('#results').html('<img src="' + data_uri + '"/>');

                    // Update button properties
                    $('#FotoTamuButton').removeClass('btn-outline-danger').addClass('btn-outline-success').prop(
                        'disabled', true).html(
                        '<i class="fa fa-check"></i> Foto Dikirim');

                    // Close the modal
                    $('#FotoTamu').modal('hide');
                });
            }


            $(document).ready(function() {

                $('form').submit(function(e) {
                    e.preventDefault();
                    $('#buttons').hide();
                    $('#buttones').hide();
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
                            $('#buttones').show();
                            $('.spinner-border').hide();
                            if (response.success) {
                                alertify.success(response.message);
                                $('form')[0].reset();
                            } else {
                                alertify.error(response.message);
                                $('#FotoTamuButton').removeClass('btn-success').addClass(
                                    'btn-outline-danger').prop('disabled', false).html(
                                    '<i class="fa fa-camera"></i> Scan Wajah');
                            }
                        },
                        error: function(error) {
                            console.error(error);
                            $('#buttons').show();
                            $('#buttones').show();
                            $('.spinner-border').hide();
                            alertify.error('Gagal, coba lagi, pastikan data terisi dengan benar');
                            //     $('#FotoTamuButton').removeClass('btn-success').addClass(
                            //          'btn-danger').prop('disabled', false).html(
                            //          '<i class="fa fa-camera"></i> Kirim Foto');

                        }
                    });
                });
            });

            function resetButtonClicked() {
                $('#FotoTamuButton').removeClass('btn-outline-success').addClass('btn-outline-danger').prop('disabled', false)
                    .html(
                        '<i class="fa fa-camera"></i> Kirim Foto');
            }
        </script>
    @endsection

    @section('css')
        <!-- alertifyjs Css -->
    @endsection
