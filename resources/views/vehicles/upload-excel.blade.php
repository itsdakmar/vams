@extends('layouts.master')
@section('main-content')
    <div class="breadcrumb">
        <h1>Pengurusan Jentera</h1>
        <ul>
            <li><a href="">Daftar Baharu</a></li>
            <li>Muat Naik Excel Maklumat Jentera</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="row">
        <div class="col px-0">
            <div class="card">
                <form method="post" action="{{ route('vehicles.excel') }}" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <div class="custom-file">
                            <input type="file" name="vehicles" class="custom-file-input" id="customFile"
                                   accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="mc-footer">
                            <div class="row text-center">
                                <div class="col-lg-12 ">
                                    <button type="submit" class="btn btn-primary m-1">Save</button>
                                    <button type="button" class="btn btn-outline-secondary m-1">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('bottom-js')
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
