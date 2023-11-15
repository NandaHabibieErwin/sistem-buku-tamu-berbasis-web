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
        <div class="row">
            <div class="col-12">
                <div class="card-deck-wrapper">
                    <div class="card-group">
                        <div class="card mb-4">
                            <img class="card-img-top img-fluid" src="{{ URL::asset('build/images/small/img-4.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Bidang Kesehatan Masyarakat Veteriner</h4>
                                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni animi similique optio dignissimos! Facilis ratione aperiam expedita cum amet ipsa odio consequuntur deserunt voluptatum ab dicta, praesentium ipsam et odit!</p>
                                <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </p>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <img class="card-img-top img-fluid" src="{{ URL::asset('build/images/small/img-4.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Bidang Produksi Peternakan</h4>
                                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni animi similique optio dignissimos! Facilis ratione aperiam expedita cum amet ipsa odio consequuntur deserunt voluptatum ab dicta, praesentium ipsam et odit!</p>
                                <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </p>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <img class="card-img-top img-fluid" src="{{ URL::asset('build/images/small/img-4.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Bidang Agribisnis Peternakan</h4>
                                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni animi similique optio dignissimos! Facilis ratione aperiam expedita cum amet ipsa odio consequuntur deserunt voluptatum ab dicta, praesentium ipsam et odit!</p>
                                <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-deck-wrapper">
                    <div class="card-group">
                        <div class="card mb-4">
                            <img class="card-img-top img-fluid" src="{{ URL::asset('build/images/small/img-4.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Bidang Keuangan</h4>
                                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni animi similique optio dignissimos! Facilis ratione aperiam expedita cum amet ipsa odio consequuntur deserunt voluptatum ab dicta, praesentium ipsam et odit!</p>
                                <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </p>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <img class="card-img-top img-fluid" src="{{ URL::asset('build/images/small/img-4.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Bidang Kepegawaian Umum</h4>
                                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni animi similique optio dignissimos! Facilis ratione aperiam expedita cum amet ipsa odio consequuntur deserunt voluptatum ab dicta, praesentium ipsam et odit!</p>
                                <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </p>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <img class="card-img-top img-fluid" src="{{ URL::asset('build/images/small/img-4.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Bidang Kesehatan Hewan</h4>
                                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni animi similique optio dignissimos! Facilis ratione aperiam expedita cum amet ipsa odio consequuntur deserunt voluptatum ab dicta, praesentium ipsam et odit!</p>
                                <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>

        <!-- end row -->
        <!-- end row -->
    @endsection
    @section('scripts')
        <!-- Card Masonry -->
        <script src="{{ URL::asset('build/libs/masonry-layout/masonry.pkgd.min.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
