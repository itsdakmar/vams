@extends('layouts.master')
@section('before-css')
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
    <style>
        .input-group-append .btn {
            height: 33px !important;
        }
    </style>
@endsection
@section('main-content')
    <div class="breadcrumb">
        <h1>Pengurusan Jentera</h1>
        <ul>
            <li><a href="">Daftar Baharu</a></li>
        </ul>
    </div>

    <div class="separator-breadcrumb border-top"></div>

    @if (session('status'))
        <div class="row">
            <div class="col">
                <div class="alert alert-card alert-success" role="alert">
                    <strong class="text-capitalize">Success!</strong> {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Maklumat Jentera</div>
                    <form action="{{ route('vehicles.store') }}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-md-6 form-group mb-3">
                                <label for="no_fail">No. Fail</label>
                                <input value="{{ old('no_fail') }}" type="text" class="form-control @error('no_fail') is-invalid @enderror" name="no_fail" id="no_fail"
                                       placeholder="Sila Masukkan No. Fail">
                                @error('no_fail')
                                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="no_kenderaan">No. Kenderaan</label>
                                <input value="{{ old('no_kenderaan') }}" type="text" class="form-control @error('no_kenderaan') is-invalid @enderror" name="no_kenderaan" id="no_kenderaan"
                                       placeholder="Sila Masukkan No. Kenderaan">
                                @error('no_kenderaan')
                                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="model">Model</label>
                                <input value="{{ old('model') }}" type="text" class="form-control @error('model') is-invalid @enderror" name="model" id="model"
                                       placeholder="Sila Masukkan Model">
                                @error('model')
                                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="jenis">Jenis</label>
                                <input value="{{ old('jenis') }}" type="text" class="form-control @error('jenis') is-invalid @enderror" name="jenis" id="jenis"
                                       placeholder="Sila Masukkan Jenis">
                                @error('jenis')
                                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <div id="balai">
                                    <label for="office">Balai</label>
                                    <select id="office" name="office_id" class="form-control @error('office_id') is-invalid @enderror">
                                        <option value="">Pilih Balai</option>
                                        @foreach($offices as $office)
                                            <option {{ (old('office_id') == $office->id ) ? "selected" : "" }} value="{{ $office->id }}">{{ $office->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('office_id')
                                    <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="no_siri_b">No. Siri B</label>
                                <input value="{{ old('no_siri_b') }}" type="text" class="form-control @error('no_siri_b') is-invalid @enderror" name="no_siri_b" id="no_siri_b"
                                       placeholder="Sila Masukkan No. Siri B">
                                @error('no_siri_b')
                                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="no_enjin">No. Enjin</label>
                                <input value="{{ old('no_enjin') }}" type="text" class="form-control @error('no_enjin') is-invalid @enderror" name="no_enjin" id="no_enjin"
                                       placeholder="Sila Masukkan No. Enjin">
                                @error('no_enjin')
                                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="no_enjin">No. Casis</label>
                                <input value="{{ old('no_casis') }}" type="text" class="form-control @error('no_casis') is-invalid @enderror" name="no_casis" id="no_casis"
                                       placeholder="Sila Masukkan No. Casis">
                                @error('no_casis')
                                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="picker-pendaftaran">Tarikh Pendaftaran</label>
                                <div class="input-group">
                                    <input value="{{ old('tarikh_pendaftaran') }}"  id="picker-pendaftaran" class="form-control @error('tarikh_pendaftaran') is-invalid @enderror" placeholder="yyyy-mm-dd" name="tarikh_pendaftaran" >
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary"  type="button">
                                            <i class="icon-regular i-Calendar-4"></i>
                                        </button>
                                    </div>
                                </div>
                                @error('tarikh_pendaftaran')
                                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="picker-perolehan">Tarikh Perolehan</label>
                                <div class="input-group">
                                    <input value="{{ old('tarikh_perolehan') }}" id="picker-perolehan" class="form-control @error('tarikh_perolehan') is-invalid @enderror" placeholder="yyyy-mm-dd" name="tarikh_perolehan" >
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary"  type="button">
                                            <i class="icon-regular i-Calendar-4"></i>
                                        </button>
                                    </div>
                                </div>
                                @error('tarikh_perolehan')
                                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary">Hantar</button>
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
@endsection

@section('bottom-js')
    <script>
        $(function () {
            $('#position').on('change', function () {
                ($(this).val() == 5) ? $('#balai').show() : $('#balai').hide();
            });

            $('#picker-pendaftaran').pickadate();
            $('#picker-perolehan').pickadate();

        });
    </script>
@endsection

