@extends('layouts.master')
@section('page-css')
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
@endsection

@section('main-content')
    <div class="breadcrumb">
        <h1>Pengurusan Jentera</h1>
        <ul>
            <li><a href="">Senarai Jentera</a></li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <!-- end of row -->

    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="dropdown float-right">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Daftar Jentera Baharu
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="top-start"
                     style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -118px, 0px);">
                    <a class="dropdown-item" href="{{ route('vehicles.excel') }}">
                        <i class="i-Bell"> </i>
                        Muat-Naik Excel Maklumat Jentera (.xlsx)</a>
                    <a class="dropdown-item" href="{{ route('vehicles.service') }}">
                        <i class="i-Bell"> </i>
                        Muat-Naik Excel Sejarah Penyelenggaraan (.xlsx)</a>
                    <a class="dropdown-item" href="{{ route('vehicles.create') }}">
                        <i class="i-Download-from-Cloud"> </i>
                        Daftar Baharu</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-between mb-4">
        <div class="col-2" style="margin-left: 15px;" id="sorting"></div>
        <div class="col-2" style="margin-right: 15px;" id="filter"></div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="vehicles-table" class="display table table-striped table-borderless" style="width:100%">
                            <thead>
                            <tr>
                                <th>No. Kenderaan</th>
                                <th>Model</th>
                                <th>Jenis</th>
                                <th>Balai</th>
                                <th>Tarikh Pendaftaran</th>
                                <th>Tarikh Perolehan</th>
                                <th>No. Fail</th>
                                <th>Tindakan</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No. Kenderaan</th>
                                <th>Model</th>
                                <th>Jenis</th>
                                <th>Balai</th>
                                <th>Tarikh Pendaftaran</th>
                                <th>Tarikh Perolehan</th>
                                <th>No. Fail</th>
                                <th>Tindakan</th>

                            </tr>
                            </tfoot>

                            @section('bottom-js')
                                <script>
                                    $(document).ready(function () {
                                        $('#vehicles-table').DataTable({
                                            processing: true,
                                            serverSide: true,
                                            ajax: {
                                                url: '{{ route('vehicles.all') }}'
                                            },
                                            columns: [
                                                {
                                                    data: 'no_kenderaan',
                                                    name: 'no_kenderaan',
                                                },
                                                {
                                                    data: 'model',
                                                    name: 'model',
                                                },
                                                {
                                                    data: 'jenis',
                                                    name: 'jenis',
                                                },
                                                {
                                                    data: 'office.name',
                                                    name: 'office.name',
                                                },
                                                {
                                                    data: 'tarikh_pendaftaran',
                                                    name: 'tarikh_pendaftaran',
                                                },
                                                {
                                                    data: 'tarikh_perolehan',
                                                    name: 'tarikh_perolehan',
                                                },
                                                {
                                                    data: 'no_fail',
                                                    name: 'no_fail',
                                                },
                                                {
                                                    data: 'action',
                                                    name: 'action',
                                                }
                                            ],
                                        });
                                    });
                                </script>
                            @endsection
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of col -->
    </div>
    <!-- end of row -->
@endsection

@section('page-js')

    <script>
        $(document).ready(function(){
            $('div.dataTables_filter').appendTo($('#filter'));
            $('div.dataTables_length').appendTo($('#sorting'));
        });
    </script>
    <script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables.script.js')}}"></script>

@endsection
