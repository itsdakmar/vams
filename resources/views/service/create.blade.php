@extends('layouts.master')
@section('before-css')
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container .select2-selection--single {
            height: calc(1.5em + 0.75rem + 2px);

        }
    </style>
@endsection
@section('main-content')
    <div class="breadcrumb">
        <h1>Pengurusan Penyelenggaraan</h1>
        <ul>
            <li><a href="">Daftar Baharu</a></li>
        </ul>
    </div>

    <div class="separator-breadcrumb border-top"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Maklumat Penyelenggaraan Jentera</div>
                    <form action="{{ route('service.store') }}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-md-6 form-group mb-3">
                                <div id="balai">
                                    <label for="selVehicle">No. Kenderaan</label>
                                    <select id="selVehicle" name="no_kenderaan" class="form-control @error('no_kenderaan') is-invalid @enderror">
                                        <option value="">Pilih No. Kenderaan</option>
                                    </select>
                                    @error('no_kenderaan')
                                    <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="picker-tarikh-penyelenggaraan">Tarikh Penyelenggaraan</label>
                                <div class="input-group">
                                    <input id="picker-tarikh-penyelenggaraan" class="form-control @error('tarikh') is-invalid @enderror" placeholder="yyyy-mm-dd" name="tarikh" >
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary"  type="button">
                                            <i class="icon-regular i-Calendar-4"></i>
                                        </button>
                                    </div>
                                </div>
                                @error('tarikh')
                                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="kos">Kos Penyelenggaraan</label>
                                <input type="text" class="form-control @error('kos') is-invalid @enderror" name="kos" id="kos"
                                       placeholder="Sila Masukkan Kos Penyelenggaraan">
                                @error('kos')
                                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">

                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="selVehicle">Jenis Penyelenggaraan</label>
                                <label class="checkbox checkbox-outline-primary">
                                    <input name="service[servis]" value="1" {{ (old('service.servis') == 1) ? 'checked' : '' }} type="checkbox" class="@error('service') is-invalid @enderror" >
                                    <span>Servis</span>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary">
                                    <input name="service[enjin]" value="1" {{ (old('service.enjin') == 1) ? 'checked' : '' }} type="checkbox" >
                                    <span>Enjin</span>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary">
                                    <input name="service[brek]" value="1" {{ (old('service.brek') == 1) ? 'checked' : '' }} type="checkbox" >
                                    <span>Brek</span>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary">
                                    <input name="service[transmisi]" value="1" {{ (old('service.transmisi') == 1) ? 'checked' : '' }} type="checkbox" >
                                    <span>Transmisi</span>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary">
                                    <input name="service[steering]" value="1" {{ (old('service.steering') == 1) ? 'checked' : '' }} type="checkbox" >
                                    <span>Steering</span>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary">
                                    <input name="service[suspension]" value="1" {{ (old('service.suspension') == 1) ? 'checked' : '' }} type="checkbox" >
                                    <span>Suspension</span>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary">
                                    <input name="service[casis]" value="1" {{ (old('service.casis') == 1) ? 'checked' : '' }} type="checkbox" >
                                    <span>Casis & Badan</span>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary">
                                    <input name="service[pam_jentera]" value="1" {{ (old('service.pam_jentera') == 1) ? 'checked' : '' }} type="checkbox" >
                                    <span>Pam Jentera</span>
                                    <span class="checkmark"></span>
                                </label>
                                @error('service')
                                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary" onclick="confirm('Adakah anda pasti?')">Hantar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-js')
    <script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>
    <script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@endsection

@section('bottom-js')
    <script>
        $(function () {

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

            $('#picker-tarikh-penyelenggaraan').pickadate();
        });
    </script>
@endsection

