@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('css')
    <!-- jsvectormap css -->
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    Dashboard
@endsection
@section('body')
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body pb-0">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-4">Overview</h5>
                        </div>
                        <div class="flex-shrink-0">
                        </div>
                    </div>

                    <div>
                        <div id="overview"
                            data-colors='["#1f58c7", "#1f58c7", "#1f58c7","#1f58c7", "#1f58c7", "#1f58c7","#1f58c7","#1f58c7","#1f58c7","#1f58c7","#1f58c7", "#1f58c7"]'
                            class="apex-chart"></div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $departements = $total->pluck('nama_departement')->toArray();
            $totals = $total->pluck('total')->toArray();
        @endphp
        <script>
            var datatamu = @json($countsPerDay);
            var total = @json($total);
            var departements = @json($departements);
            var totals = @json($totals);
        </script>

        <div class="col-xxl-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="card-title mb-4 text-truncate">Departement yang dikunjungi</h5>
                        </div>
                        <div class="flex-shrink-0 ms-2">
                        </div>
                    </div>

                    <div id="saleing-categories" data-colors='["#1f58c7", "#4976cf","#6a92e1", "#e6ecf9"]'
                        class="apex-charts" dir="ltr"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="font-size-15">Total Kunjungan</h6>
                                <h4 class="mt-3 pt-1 mb-0 font-size-22">{{ $totalSemua }} Orang </h4>
                            </div>
                            <div class="">
                                <div class="avatar">
                                    <div class="avatar-title rounded bg-soft-primary">
                                        <i class="fa fa-users font-size-24 mb-0 text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="mb-0 font-size-15">Total Penerimaan</h6>
                                <h4 class="mt-3 mb-0 font-size-22">{{ $totalTerima }} Orang</h4>

                            </div>

                            <div class="">
                                <div class="avatar">
                                    <div class="avatar-title rounded bg-soft-primary">
                                        <i class="fa fa-thumbs-up font-size-24 mb-0 text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="mb-0 font-size-15">Pengunjung Hari Ini</h6>
                                <h4 class="mt-3 mb-0 font-size-22"> {{ $totalHari }} Orang </h4>
                            </div>

                            <div class="">
                                <div class="avatar">
                                    <div class="avatar-title rounded bg-soft-primary">
                                        <i class="fa fa-calendar font-size-24 mb-0 text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="mb-0 font-size-15">Pengunjung Dept</h6>
                                <h4 class="mt-3 mb-0 font-size-22"> {{ $totalDept }} Orang </h4>
                            </div>

                            <div class="">
                                <div class="avatar">
                                    <div class="avatar-title rounded bg-soft-primary">
                                        <i class="fa fa-building font-size-24 mb-0 text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->



    </div>
    <!-- end row -->
    <!-- end row -->
@endsection
@section('scripts')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/dashboard-sales.init.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
