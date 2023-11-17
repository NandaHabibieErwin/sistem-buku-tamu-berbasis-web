@extends('layouts.master-without-nav')
@section('title')
    Dashboard
@endsection
@section('page-title')
    Dashboard
@endsection
@section('body')

    <body>
    @endsection
    @section('content')

    <div class="min-vh-100" style="background: url(build/images/bg-2.png) top;">
        <div class="bg-overlay bg-light"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center py-5 mt-5">
                       <div class="position-relative">
                          <image class="mb-0 image-fluid" src={{ URL::asset('build/images/logo-dark.png') }} height=100px></image>


                       </div>
                        <div class="mt-4 text-center">
                            <a class="btn btn-primary" href="{{ route('bukutamu') }}">Buku Tamu</a>
                            <a class="btn btn-primary" href="{{ route('department') }}">Departemen</a>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end authentication section -->

@endsection
