@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
@endsection

@section('main-content')
  <div class="breadcrumb">
                <h1>Datatables</h1>
                <ul>
                    <li><a href="">User Management</a></li>
                    <li>List of users</li>
                </ul>
      <button class="btn btn-primary pull-right pt-2">Create User</button>

  </div>
            <div class="separator-breadcrumb border-top"></div>
            <!-- end of row -->

            <div class="row mb-4">
                <div class="col-md-12 mb-4">
                    <div class="card text-left">
                        <div class="card-body">
                            <h4 class="card-title mb-3">List of users</h4>
                            <p>List of all users registered on the system.</p>
                            <div class="table-responsive">
                                <table id="users-table" class="display table table-striped table-bordered" style="width:100%">
                                 @include('datatables.table_content')
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
