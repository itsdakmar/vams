@extends('layouts.master')
@section('page-css')

    <link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
@endsection

@section('main-content')
    <div class="breadcrumb">
        <h1>Pengurusan Pengguna</h1>
        <ul>
            <li><a href="">Senarai Pengguna</a></li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <!-- end of row -->

    <div class="row mb-4">
        <div class="offset-8 col-4">
            <a href="{{ route('users.create') }}" class="btn btn-primary float-lg-right mb-3">Daftar Baharu</a>
        </div>
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="users-table" class="display table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jawatan</th>
                                <th>Balai</th>
                                <th>Alamat Emel</th>
                                <th>No. Telefon</th>
                                <th>Tarikh Daftar</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Jawatan</th>
                                <th>Balai</th>
                                <th>Alamat Emel</th>
                                <th>No. Telefon</th>
                                <th>Tarikh Daftar</th>
                            </tr>
                            </tfoot>

                            @section('bottom-js')
                                <script>
                                    $(document).ready(function () {
                                        $('#users-table').DataTable({
                                            processing: true,
                                            serverSide: true,
                                            ajax: {
                                                url: '{{ route('users.all') }}'
                                            },
                                            columns: [
                                                {
                                                    data: 'name',
                                                    name: 'name',
                                                },
                                                {
                                                    data: 'position.name',
                                                    name: 'position.name',
                                                },
                                                {
                                                    data: 'balai',
                                                    name: 'balai',
                                                },
                                                {
                                                    data: 'email',
                                                    name: 'email',
                                                },
                                                {
                                                    data: 'phone',
                                                    name: 'phone',
                                                },
                                                {
                                                    data: 'created_at',
                                                    name: 'created_at',
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

    <script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables.script.js')}}"></script>

@endsection
