@extends('layouts.master')
@section('main-content')
    <div class="breadcrumb">
        <h1>Pengurusan Pengguna</h1>
        <ul>
            <li><a href="{{ route('users.index') }}">Senarai Pengguna</a></li>
            <li>Daftar Baharu</li>
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
                    <div class="card-title mb-3">Maklumat Pengguna</div>
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="radio" class="mr-2">Jenis Pengguna</label>

                                <div class="form-inline">
                                    <label class="radio radio-outline-primary mr-2">
                                        <input type="radio" name="user" value="1" formcontrolname="radio">
                                        <span>Admin</span>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio radio-outline-primary">
                                        <input type="radio" name="user" value="0" formcontrolname="radio">
                                        <span>Pengguna Biasa</span>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                @error('user')
                                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group mb-3">
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="name">Nama Penuh</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                       id="name"
                                       placeholder="Sila Masukkan Nama Penuh">
                                @error('name')
                                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group mb-3">
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="position">Jawatan</label>
                                <select id="position" name="position"
                                        class="form-control @error('position') is-invalid @enderror">
                                    <option value="">Pilih Jawatan</option>
                                    @foreach($positions as $position)
                                        <option value="{{ $position->id }}">{{ $position->name }}</option>
                                    @endforeach
                                </select>
                                @error('position')
                                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <div id="balai" style="display: none">
                                    <label for="office">Balai</label>
                                    <select id="office" name="office_id"
                                            class="form-control @error('office') is-invalid @enderror">
                                        <option value="">Pilih Balai</option>
                                        @foreach($offices as $office)
                                            <option value="{{ $office->id }}">{{ $office->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('office')
                                    <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="email">Email address</label>
                                <input type="email" name="email"
                                       class="form-control @error('email') is-invalid @enderror" id="email"
                                       placeholder="Masukkan Alamat emel">
                                @error('email')
                                <div class="ul-form__text form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="phone">Phone</label>
                                <input class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                                       placeholder="Masukkan no. telefon">
                                @error('phone')
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

@section('bottom-js')
    <script>
        $(function () {
            $('#position').on('change', function () {
                ($(this).val() == 5) ? $('#balai').show() : $('#balai').hide();
            });
        });
    </script>
@endsection

