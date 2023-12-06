<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('layouts.master')
@section('title')
    Data Tamu
@endsection
@section('css')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">

    <!-- flatpickr css -->
    <link href="{{ URL::asset('build/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('page-title')
    Data Tamu {{ Auth::user()->departement->nama_departement }}
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div id="table-invoices-list"></div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

        </div>
        <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <!-- Modal -->
        @foreach ($data as $tamu)
            <div class="modal fade" id="TujuanTamu_{{ $tamu->id_tamu }}" tabindex="-1" role="dialog"
                aria-labelledby="orderdetailsModalLabel_{{ $tamu->id_tamu }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="orderdetailsModalLabel">Alasan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="mb-4"><span class="text-primary">{{ $tamu->tujuan }}</span></p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- end modal -->

        @foreach ($data as $tamu)
        <div class="modal fade tolak{{ $tamu->id_tamu }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myExtraLargeModalLabel">Alasan penolakan {{ $tamu->nama }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <textarea name="alasan" class="form-control" id="productdesc{{ $tamu->id_tamu }}" placeholder="Alasan Menolak" rows="4"></textarea>
                        <div class="row mt-2">
                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-danger me-1" data-bs-dismiss="modal"><i
                                        class="bx bx-x me-1"></i> Cancel</button>
                                <button type="submit" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#success-btn" id="btn-save-event" onclick="updateStatus({{ $tamu->id_tamu }}, 2)"><i class="bx bx-check me-1"></i>
                                    Confirm</button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        @endforeach

        <!--  successfully modal  -->
        <div id="success-btn" class="modal fade" tabindex="-1" aria-labelledby="success-btnLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <i class="bx bx-check-circle display-1 text-success"></i>
                            <h4 class="mt-3">Pesan telah dikirim</h4>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endsection
    @section('scripts')
        <script>
            var datatamu = @json($data);

            var tamuId = button.data('id_tamu'); // Extract tamu ID from data attribute
            // Find the corresponding tamu object in your data
            var tamu = datatamu.find(function(item) {
                return item.id_tamu === tamuId;
            });

            // Update modal content with the correct tujuan value
            var modal = $(this);
            modal.find('.text-primary').text(tamu.tujuan);
        </script>

        <!-- gridjs js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
        <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>

        <!-- flatpickr js -->
        <script src="{{ URL::asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>
        <!-- invoice-list init -->
        <script src="{{ URL::asset('build/js/pages/tabelbukutamu.js') }}"></script>

        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
