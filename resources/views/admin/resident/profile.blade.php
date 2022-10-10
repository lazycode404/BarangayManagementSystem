@extends('layouts.master')

@section('title', 'Barangay Information System')

@section('breadcrumbs')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Resident Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Resident Profile</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

<style>
    .logo {
        cursor: pointer;
    }

    .profpic {
        width: 130 !important;
    }

    .textinfo {
        font-size: 16;
    }
</style>
@section('content')
    <div class="container-fluid">
        @include('layouts.components.flashmessages')
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title pt-1">About Me</h3>
                    </div>
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-circle profpic mb-1" height="128"
                                src="@if ($residentprofile->image === null) {{ asset('assets/images/user.png') }} @else {{ asset('assets/images/residents/' . $residentprofile->image) }} @endif"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center mb-3">{{ Str::upper($residentprofile->firstname) }}
                            @if ($residentprofile->middlename == null)
                            @else
                                {{ substr(Str::upper($residentprofile->middlename), 0, 1) }}.
                            @endif {{ Str::upper($residentprofile->lastname) }}
                        </h3>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b><i class="fa fa-calendar" aria-hidden="true"></i> Age</b> <a
                                    class="float-right">{{ $residentprofile->age }}</a>
                            </li>
                            <li class="list-group-item">
                                <b><i class="fa fa-venus-mars" aria-hidden="true"></i> Gender</b> <a
                                    class="float-right">{{ $residentprofile->gender }}</a>
                            </li>
                            <li class="list-group-item">
                                <b><i class="fa fa-thermometer-full" aria-hidden="true"></i> Civil Status</b> <a
                                    class="float-right">{{ $residentprofile->civil_status }}</a>
                            </li>
                            <li class="list-group-item">
                                <b><i class="fa fa-calendar" aria-hidden="true"></i> Birth Date</b> <a
                                    class="float-right">{{ date('M d, Y', strtotime($residentprofile->birth_date)) }}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#Personal" data-toggle="tab">Personal
                                    Information</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#Case" data-toggle="tab">Case Involved</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="Personal">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item textinfo">
                                        <b><i class="fa fa-map" aria-hidden="true"></i> Birth Place</b> <a
                                            class="float-right">{{ $residentprofile->birth_place }}</a>
                                    </li>
                                    <li class="list-group-item textinfo">
                                        <b><i class="fa fa-mobile" aria-hidden="true"></i> Phone Number</b> <a
                                            class="float-right">{{ $residentprofile->phone_number }}</a>
                                    </li>
                                    <li class="list-group-item textinfo">
                                        <b><i class="fa fa-address-card" aria-hidden="true"></i> Email Address</b> <a
                                            class="float-right">{{ $residentprofile->email }}</a>
                                    </li>
                                    <li class="list-group-item textinfo">
                                        <b><i class="fa fa-map-signs" aria-hidden="true"></i> Purok</b> <a
                                            class="float-right">{{ $residentprofile->purok }}</a>
                                    </li>
                                    <li class="list-group-item textinfo">
                                        <b><i class="fa fa-home" aria-hidden="true"></i> Street</b> <a
                                            class="float-right">{{ $residentprofile->street }}</a>
                                    </li>
                                    <li class="list-group-item textinfo">
                                        <b><i class="fa fa-male" aria-hidden="true"></i> Citizenship</b> <a
                                            class="float-right">{{ $residentprofile->citizenship }}</a>
                                    </li>
                                    <li class="list-group-item textinfo">
                                        <b><i class="fa fa-university" aria-hidden="true"></i> Religion</b> <a
                                            class="float-right">{{ $residentprofile->religion }}</a>
                                    </li>
                                    <li class="list-group-item textinfo">
                                        <b><i class="fa fa-briefcase" aria-hidden="true"></i> Occupation</b> <a
                                            class="float-right">{{ $residentprofile->occupation }}</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="Case">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Case</th>
                                            <th>Date & Time Reported</th>
                                            <th>Date & Time Incident</th>
                                            <th width="50">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blotter as $row)
                                            <tr>
                                                <td>
                                                    @if ($row->status == 'New')
                                                        <i class="fa fa-circle text-primary"></i> New
                                                    @elseif($row->status == 'Ongoing')
                                                        <i class="fa fa-circle text-warning"></i> Ongoing
                                                    @else
                                                        <i class="fa fa-circle text-success"></i> Resolved
                                                    @endif
                                                </td>
                                                <td>{{ $row->incident_type }}</td>
                                                <td>{{ date('M d, Y g:i a', strtotime($row->dateTime_reported)) }}</td>
                                                <td>{{ date('M d, Y g:i a', strtotime($row->dateTime_incident)) }}</td>
                                                <td>
                                                    <a class="btn btn-primary" href=""><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
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
