@extends('layouts.master')

@section('title', 'Barangay Information System')

@section('breadcrumbs')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Barangay Information</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Barangay Page</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

<style>
    .logo{
        cursor: pointer;
    }
</style>
@section('content')
    <div class="container-fluid">
        @include('layouts.components.flashmessages')
        <div class="row">
            <div class="col-sm-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="@if($barangay === null || $barangay->logo === null) {{ asset('assets/images/yourlogo1.png') }} @else {{ asset('assets/images/'.$barangay->logo) }} @endif" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"></h3>
                        <form action="{{ url('admin/barangay/create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <p class="text-center">
                            <div class="form-group text-center">
                                <label class="text-primary logo" for="fileLogo">
                                    <ion-icon name="create-sharp"></ion-icon> Change Logo
                                </label>
                                <input type="file" name="logo" id="fileLogo" style="display: none">
                            </div>
                            </p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Barangay</b>
                                    <a class="float-right">
                                        @if ($barangay === null)
                                        @else
                                            {{ $barangay->barangay }}
                                        @endif
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Municipality</b>
                                    <a class="float-right">
                                        @if ($barangay === null)
                                        @else
                                            {{ $barangay->municipality }}
                                        @endif
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Province</b>
                                    <a class="float-right">
                                        @if ($barangay === null)
                                        @else
                                            {{ $barangay->province }}
                                        @endif
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Phone Number</b>
                                    <a class="float-right">
                                        @if ($barangay === null)
                                        @else
                                            {{ $barangay->phonenumber }}
                                        @endif
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b>
                                    <a class="float-right">
                                        @if ($barangay === null)
                                        @else
                                            {{ $barangay->emailAddress }}
                                        @endif
                                    </a>
                                </li>
                            </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header pt-3">
                        <h5 class="text-muted"><i class="fa fa-cog" aria-hidden="true"></i> Barangay Settings</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="form-group row">
                            <label for="barangay" class="col-sm-2 col-form-label">Barangay</label>
                            <div class="col-sm-10">
                                <input type="text" name="barangay" class="form-control" id="barangay"
                                    value="@if ($barangay === null) @else{{ $barangay->barangay }} @endif">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="municipality" class="col-sm-2 col-form-label">Municipality</label>
                            <div class="col-sm-10">
                                <input type="text" name="municipality" class="form-control" id="municipality"
                                    value="@if ($barangay === null) @else{{ $barangay->municipality }} @endif">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="province" class="col-sm-2 col-form-label">Province</label>
                            <div class="col-sm-10">
                                <input type="text" name="province" class="form-control" id="province"
                                    value="@if ($barangay === null) @else{{ $barangay->province }} @endif">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pnumber" class="col-sm-2 col-form-label">Phone number</label>
                            <div class="col-sm-10">
                                <input type="text" name="phonenumber" class="form-control" id="pnumber"
                                    value="@if ($barangay === null) @else{{ $barangay->phonenumber }} @endif">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email Address</label>
                            <div class="col-sm-10">
                                <input type="email" name="emailAddress" class="form-control" id="email"
                                    value="@if ($barangay === null) @else{{ $barangay->emailAddress }} @endif">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    <ion-icon name="save-sharp"></ion-icon> Update
                                </button>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // show the alert
            setTimeout(function() {
                $(".alert").alert('close');
            }, 5000);
        });
    </script>
@endsection
