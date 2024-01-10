@extends('layouts.master')
@section('title')
    Print
@endsection
@section('page-title')
    Print
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('print') }}" class="btn btn-success me-1" id="customPrintButton"><i
                                class="fa fa-print"></i></a>
                        <a href="{{ route('print') }}" class="btn btn-success me-1" id="customPDFButton"><i
                                class="fa fa-print"></i></a>
                        <a href="{{ route('print') }}" class="btn btn-success me-1" id="customCSVButton"><i
                                class="fa fa-print"></i></a>
                        <a href="{{ route('print') }}" class="btn btn-success me-1" id="customExcelButton"><i
                                class="fa fa-print"></i></a>
                        <div class="table-responsive">
                            <table id="example" class=" table table-bordered mb-0 display nowrap">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>No Telepon</th>
                                        <th>Jadwal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $data)
                                        <tr>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->notelp }}</td>
                                            <td>{{ $data->jadwal }}</td>
                                            <td>
                                                @if ($data->status == 0)
                                                    Pending
                                                @elseif($data->status == 1)
                                                    Disetujui
                                                @elseif($data->status == 2)
                                                    Ditolak
                                                @else
                                                    Unknown Status
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama</th>
                                        <th>No Telepon</th>
                                        <th>Jadwal</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        @endsection
        @section('scripts')
            <!-- App js -->
            <script src="{{ URL::asset('build/js/app.js') }}"></script>
            <!-- jQuery -->
            <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

            <!-- DataTables -->
            <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

            <!-- DataTables Buttons -->
            <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
            <script>
                window.onload = function() {
                    var button = document.getElementById("customExcelButton");
                    button.click(); // Simulate a click on the button
                    setTimeout(function() {
                                    window.close();
                                }, 75);
                };
            </script>
            <script>
                $(document).ready(function() {
                    // Initialize DataTable with buttons
                    var table = $('#example').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });

                    // Handle custom print button click
                    $('#customPrintButton').on('click', function(e) {
                        e.preventDefault();
                        // Trigger the print button
                        table.button('4').trigger();
                    });

                    // Handle custom PDF button click
                    $('#customPDFButton').on('click', function(e) {
                        e.preventDefault();
                        // Trigger the PDF button
                        table.button('3').trigger();

                    });

                    // Handle custom CSV button click
                    $('#customCSVButton').on('click', function(e) {
                        e.preventDefault();
                        // Trigger the CSV button
                        table.button('1').trigger();
                    });

                    // Handle custom Excel button click
                    $('#customExcelButton').on('click', function(e) {
                        e.preventDefault();
                        // Trigger the Excel button
                        table.button('2').trigger();
                    });
                });
            </script>
        @endsection
