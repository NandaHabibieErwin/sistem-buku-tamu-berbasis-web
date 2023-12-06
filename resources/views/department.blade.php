@extends('layouts.master')
@section('title')
    Cards
@endsection
@section('page-title')
    Departement
@endsection
@section('body')

    <body>
    @endsection
    @section('content')

    <div class="row mb-4"> <!-- Add mb-4 for spacing between rows -->
        @foreach ($data as $index => $dept)
            @if ($index > 0 && $index % 3 == 0)
                </div><div class="row mb-4"> <!-- Close and open a new row with spacing -->
            @endif

            <div class="col-md-4">
                <div class="card mb-4 h-100">
                    <img class="card-img-top img-fluid" src="{{ URL::asset('build/images/small/img-4.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">{{ $dept->nama_departement }}</h4>
                        <p class="card-text">{{ $dept->desc_departement }}</p>
                        <p class="card-text">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



        <!-- end row -->
        <!-- end row -->
    @endsection
    @section('scripts')
        <!-- Card Masonry -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
        <script src="{{ URL::asset('build/libs/masonry-layout/masonry.pkgd.min.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection

    @section('css')
    <!-- alertifyjs Css -->
@endsection
