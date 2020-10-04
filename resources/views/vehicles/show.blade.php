@extends('layouts.master')
@section('page-css')
<style>
    .paging_simple_numbers{
        float: right !important;
    }
</style>
@endsection

@section('main-content')

    <div class="breadcrumb">
        <h1>Pengurusan Jentera</h1>
        <ul>
            <li><a href="">Maklumat Terperinci Jentera</a></li>
            <li>{{ $vehicle->no_kenderaan }}</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <!-- content goes here -->

    <section class="ul-product-detail">
        <div class="row">
            <div class="col-12">
                <div class="card mt-2 mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="ul-product-detail__image">
                                    <img src="{{ asset('assets/images/jentera.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="ul-product-detail__brand-name mb-4">
                                    <h5 class="heading">{{ $vehicle->no_kenderaan }}</h5>
                                    <span class="text-mute">{{ $vehicle->no_fail }}</span>
                                    <input type="hidden" id="url" value="{{ route('vehicles.service.history', $vehicle->id) }}">
                                </div>

                                <div class="ul-product-detail__features my-4">
                                    <h6 class=" font-weight-700">Perakuan Pendaftaran Kenderaan:</h6>
                                    <ul class="m-0 p-0">
                                        <li>
                                            <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                            <span class="align-middle">No. Siri B : <span
                                                    class="font-weight-bold align-middle">{{ $vehicle->no_siri_b }}</span> </span>
                                        </li>
                                        <li>
                                            <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                            <span class="align-middle">No. Enjin : <span
                                                    class="font-weight-bold align-middle">{{ $vehicle->no_enjin }}</span> </span>
                                        </li>
                                        <li>
                                            <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                            <span class="align-middle">No. Casis : <span
                                                    class="font-weight-bold align-middle">{{ $vehicle->no_casis }}</span></span>
                                        </li>
                                        <li>
                                            <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                            <span class="align-middle">Tarikh Pendaftaran : <span
                                                    class="font-weight-bold align-middle">{{ $vehicle->tarikh_pendaftaran }}</span> </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ul-product-detail__features my-4">
                                    <h6 class=" font-weight-700">KEW.PA 2:</h6>
                                    <ul class="m-0 p-0">
                                        <li>
                                            <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                            <span class="align-middle">Tarikh Perolehan: <span
                                                    class="font-weight-bold align-middle">{{ $vehicle->tarikh_perolehan }}</span> </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ul-product-detail__features my-4">
                                    <h6 class=" font-weight-700">KEJ 1 (PIN.1/19):</h6>
                                    <ul class="m-0 p-0">
                                        <li>
                                            <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                            <span class="align-middle">Model : <span
                                                    class="font-weight-bold align-middle">{{ $vehicle->model }}</span> </span>
                                        </li>
                                        <li>
                                            <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                            <span class="align-middle">Jenis : <span
                                                    class="font-weight-bold align-middle">{{ $vehicle->jenis }}</span> </span>
                                        </li>
                                        <li>
                                            <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                            <span class="align-middle">Balai : <span
                                                    class="font-weight-bold align-middle">{{ $vehicle->office->name }}</span></span>
                                        </li>
                                        <li>
                                            <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                            <span class="align-middle">No. Fail : <span
                                                    class="font-weight-bold align-middle">{{ $vehicle->no_fail }}</span> </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="mt-4 mb-2">
        <h1 style="font-size: 1.5rem;line-height: 1;margin: 0 0 1.25rem;">Sejarah Penyelenggaraan Jentera</h1>
        <div class="separator-breadcrumb border-top"></div>
    </div>
    <section class="ul-product-detail__tab">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="float-left">
                            <i class="nav-icon i-Align-Justify-All text-25 ul-contact-mobile-icon"></i>
                        </div>
                        <div class="tab-content ul-contact-list-table--label" id="nav-tabContent">

                            <!-- services-history  -->
                            <div class="tab-pane fade show active" id="list-home"
                                 role="tabpanel" aria-labelledby="list-home-list">

                                <div class=" text-left ">
                                    <div class="table-responsive">
                                        <table id="services-table"
                                               class="display table table-striped table-borderless ul-contact-list-table"
                                               style="width:100%">
                                            <thead>
                                            <tr class="border-bottom">
                                                <th>Tarikh</th>
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

@section('bottom-js')

    <script>
        $(document).ready(function () {
            let url = $('#url').val();

            $('#services-table').DataTable({
                processing: true,
                serverSide: true,
                order: [[ 0, "desc" ]],
                ajax: {
                    url: url
                },
                columns: [
                    {
                        data: 'tarikh',
                        name: 'tarikh',
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
        });
    </script>

@endsection

@section('page-js')

    <script src="https://momentjs.com/downloads/moment.min.js"></script>
    <script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables.script.js')}}"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.12/sorting/datetime-moment.js"></script>

@endsection
