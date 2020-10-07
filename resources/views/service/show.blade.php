@extends('layouts.master')
@section('page-css')
    <style>
        .paging_simple_numbers {
            float: right !important;
        }
    </style>
@endsection

@section('main-content')

    <div class="mt-4 mb-2">
        <h1 style="font-size: 1.5rem;line-height: 1;margin: 0 0 1.25rem;">Sahkan Tarikh Penyelenggaraan Jentera</h1>
        <div class="separator-breadcrumb border-top"></div>
    </div>
    <section class="ul-product-detail__tab mb-4">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="ul-product-detail__features my-4">
                            <h6 class=" font-weight-700">Maklumat Penyelenggaran:</h6>
                            <ul class="m-0 p-0">
                                <li>
                                    <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                    <span class="align-middle">Tarikh Penyelenggaran : <span
                                            class="font-weight-bold align-middle">{{ $service->tarikh->format('d/m/Y') }}</span> </span>
                                </li>
                                <li>
                                    <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                    <span class="align-middle">Status Penyelenggaran : <span
                                            class="font-weight-bold align-middle">{{ $service->status }}</span> </span>
                                </li>
                                <li>
                                    <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                    <span class="align-middle">Jenis Penyelenggaran : </span>
                                    <ul>
                                        @if($service->servis == 1)
                                            <li>
                                                <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                                <span class="font-weight-bold align-middle">Servis</span>

                                            </li>
                                        @endif
                                        @if($service->enjin == 1)
                                            <li>
                                                <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                                <span class="font-weight-bold align-middle">Enjin</span>
                                            </li>
                                        @endif
                                        @if($service->brek == 1)
                                            <li>
                                                <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                                <span class="font-weight-bold align-middle">Brek</span>
                                            </li>
                                        @endif
                                        @if($service->transmisi == 1)
                                            <li>
                                                <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                                <span class="font-weight-bold align-middle">Transmisi</span>
                                            </li>
                                        @endif
                                        @if($service->steering == 1)
                                            <li>
                                                <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                                <span class="font-weight-bold align-middle">Steering</span>
                                            </li>
                                        @endif
                                        @if($service->suspension == 1)
                                            <li>
                                                <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                                <span class="font-weight-bold align-middle">Suspension</span>
                                            </li>
                                        @endif
                                        @if($service->casis == 1)
                                            <li>
                                                <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                                <span class="font-weight-bold align-middle">Casis & Badan</span>
                                            </li>
                                        @endif
                                        @if($service->pam_jentera == 1)
                                            <li>
                                                <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                                <span class="font-weight-bold align-middle">Pam Jentera</span>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                            @if($service->status == 'waiting')
                                <div class="form-group mt-4">
                                    <h6 class=" font-weight-700">Terima / Tangguh Tarikh :</h6>
                                    <a href="{{ route('service.confirmed', $service->id) }}"
                                       class="btn btn-success mb-2 w-sm-100 mr-2"
                                       onclick="return confirm('Adakah anda pasti?')">Terima Tarikh</a>
                                    <a href="{{ route('service.postponed', $service->id) }}"
                                       class="btn btn-warning mb-2 w-sm-100"
                                       onclick="return confirm('Adakah anda pasti?')">Tangguh Tarikh</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="breadcrumb">
        <h1>Pengurusan Penyelenggaran</h1>
        <ul>
            <li><a href="">Maklumat Terperinci Jentera</a></li>
            <li>{{ $service->vehicle->no_kenderaan }}</li>
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
                                    <h5 class="heading">{{ $service->vehicle->no_kenderaan }}</h5>
                                    <span class="text-mute">{{ $service->vehicle->no_fail }}</span>
                                    <input type="hidden" id="url"
                                           value="{{ route('vehicles.service.history', $service->vehicle->id) }}">
                                </div>

                                <div class="ul-product-detail__features my-4">
                                    <h6 class=" font-weight-700">Perakuan Pendaftaran Kenderaan:</h6>
                                    <ul class="m-0 p-0">
                                        <li>
                                            <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                            <span class="align-middle">No. Siri B : <span
                                                    class="font-weight-bold align-middle">{{ $service->vehicle->no_siri_b }}</span> </span>
                                        </li>
                                        <li>
                                            <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                            <span class="align-middle">No. Enjin : <span
                                                    class="font-weight-bold align-middle">{{ $service->vehicle->no_enjin }}</span> </span>
                                        </li>
                                        <li>
                                            <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                            <span class="align-middle">No. Casis : <span
                                                    class="font-weight-bold align-middle">{{ $service->vehicle->no_casis }}</span></span>
                                        </li>
                                        <li>
                                            <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                            <span class="align-middle">Tarikh Pendaftaran : <span
                                                    class="font-weight-bold align-middle">{{ $service->vehicle->tarikh_pendaftaran }}</span> </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ul-product-detail__features my-4">
                                    <h6 class=" font-weight-700">KEW.PA 2:</h6>
                                    <ul class="m-0 p-0">
                                        <li>
                                            <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                            <span class="align-middle">Tarikh Perolehan: <span
                                                    class="font-weight-bold align-middle">{{ $service->vehicle->tarikh_perolehan }}</span> </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ul-product-detail__features my-4">
                                    <h6 class=" font-weight-700">KEJ 1 (PIN.1/19):</h6>
                                    <ul class="m-0 p-0">
                                        <li>
                                            <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                            <span class="align-middle">Model : <span
                                                    class="font-weight-bold align-middle">{{ $service->vehicle->model }}</span> </span>
                                        </li>
                                        <li>
                                            <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                            <span class="align-middle">Jenis : <span
                                                    class="font-weight-bold align-middle">{{ $service->vehicle->jenis }}</span> </span>
                                        </li>
                                        <li>
                                            <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                            <span class="align-middle">Balai : <span
                                                    class="font-weight-bold align-middle">{{ $service->vehicle->office->name }}</span></span>
                                        </li>
                                        <li>
                                            <i class="i-Right1 text-primary text-15 align-middle font-weight-700"> </i>
                                            <span class="align-middle">No. Fail : <span
                                                    class="font-weight-bold align-middle">{{ $service->vehicle->no_fail }}</span> </span>
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




@endsection

@section('bottom-js')



@endsection


