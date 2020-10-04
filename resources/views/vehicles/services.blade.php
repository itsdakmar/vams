@extends('layouts.master')
@section('page-css')
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('main-content')
    <div class="breadcrumb">
        <h1>Pengurusan Jentera</h1>
        <ul>
            <li><a href="">Senarai Servis Jentera Akan Datang</a></li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <section class="ul-product-detail__tab">
        <div class="row">
            <div class="col-lg-12 col-md-12">



                <div class="card">
                    <div class="card-body">
                        <div class="" id="nav-tabContent">
                            <select id='selVehicle' class="form-control">
                                <option value='0'>-- Select No. Kenderaan --</option>
                            </select>
                            <!-- services-history  -->
                            <div class="tab-pane fade show active" id="list-home"
                                 role="tabpanel" aria-labelledby="list-home-list">

                                <div class=" text-left ">
                                    <div class="table-responsive">
                                        <table id="services-upcoming-table"
                                               class="display table table-striped table-borderless ul-contact-list-table"
                                               style="width:100%">
                                            <thead>
                                            <tr class="border-bottom">
                                                <th>Tarikh</th>
                                                <th>No. Kenderaan</th>
                                                <th>Servis</th>
                                                <th>Enjin</th>
                                                <th>Brek</th>
                                                <th>Transmisi</th>
                                                <th>Steering</th>
                                                <th>Suspension</th>
                                                <th>Casis & Badan</th>
                                                <th>Pam Jentera</th>
                                                <th>Kos (RM)</th>
                                            </tr>
                                            </thead>
                                            <tbody></tbody>
                                            <tfoot>
                                            <tr class="border-top">
                                                <th>Tarikh</th>
                                                <th>No. Kenderaan</th>
                                                <th>Servis</th>
                                                <th>Enjin</th>
                                                <th>Brek</th>
                                                <th>Transmisi</th>
                                                <th>Steering</th>
                                                <th>Suspension</th>
                                                <th>Casis & Badan</th>
                                                <th>Pam Jentera</th>
                                                <th>Kos (RM)</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page-js')
    <script>
        $(document).ready(function () {
            let oTable = $('#services-upcoming-table').DataTable({
                processing: true,
                serverSide: true,
                order: [[0, "desc"]],
                ajax: {
                    url: '{{ route('vehicles.service.upcoming') }}'
                },
                columns: [
                    {
                        data: 'tarikh',
                        name: 'tarikh',
                        width: '100%'
                    },
                    {
                        data: 'vehicle.no_kenderaan',
                        name: 'vehicle.no_kenderaan',
                    },
                    {
                        data: 'servis',
                        name: 'servis',
                    },
                    {
                        data: 'enjin',
                        name: 'enjin',
                    },
                    {
                        data: 'brek',
                        name: 'brek',
                    },
                    {
                        data: 'transmisi',
                        name: 'transmisi',
                    },
                    {
                        data: 'steering',
                        name: 'steering',
                    },
                    {
                        data: 'suspension',
                        name: 'suspension',
                    },
                    {
                        data: 'casis',
                        name: 'casis',
                    },
                    {
                        data: 'pam_jentera',
                        name: 'pam_jentera',
                    },
                    {
                        data: 'kos',
                        name: 'kos',
                    }
                ],
                rowCallback: function (row, data, index) {
                    let dateCell = data.tarikh;

                    if (dateCell !== undefined && dateCell > 0) {
                        let date = moment.unix(dateCell).format('DD / MM / YYYY');
                        $('td:eq(0)', row).html(date);
                    }
                }
            });

            $('div.dataTables_length').remove();
            $('#selVehicle').appendTo('#services-upcoming-table_wrapper > .row > .col-sm-12:first');

            $('#selVehicle').on('change',function(){
                oTable.search($(this).val()).draw();
            });

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $( "#selVehicle" ).select2({
                ajax: {
                    url: "{{route('select2.vehicles')}}",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }

            });

        });
    </script>
    <script src="https://momentjs.com/downloads/moment.min.js"></script>
    <script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables.script.js')}}"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.12/sorting/datetime-moment.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection
