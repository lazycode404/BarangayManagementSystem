@extends('layouts.master')

@section('title', 'Barangay Information System')

@section('breadcrumbs')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Resident</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Add Resident</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

<style>
    .logo {
        cursor: pointer;
    }

    select.form-control {
        -webkit-appearance: menulist;
    }

    .centercamera {
        padding-left: 50;
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
                            <img class="profile-user-img img-fluid img-circle" id="results"
                                src="{{ asset('assets/images/user.png') }}" alt="User profile picture">
                            <div id="resultscamera"></div>
                        </div>

                        <h3 class="profile-username text-center"></h3>

                        <p class="text-center">
                        </p>
                        <hr>
                        <ul class="list-group list-group-unbordered mb-3">
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                data-target="#exampleModal">
                                Capture Profile Picture
                            </button>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header pt-3">
                        <h3 class="card-title">Resident Form</h3>
                    </div>
                    <form action="{{ url('admin/resident/store') }}" method="POST">
                        @csrf
                        <div class="card-body p-4">
                            <input type="hidden" name="image" class="image-tag">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname"
                                        placeholder="First name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname"
                                        placeholder="Last name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="middlename">Middle Name</label>
                                    <input type="text" class="form-control" name="middlename" id="middlename"
                                        placeholder="Middle name">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Email">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="age">Age</label>
                                    <input type="text" class="form-control" name="age" id="age"
                                        placeholder="Age">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" name="gender">
                                        <option selected>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="civilstatus">Civil Status</label>
                                    <select class="form-control" name="civilstatus">
                                        <option selected>Select Civil Status</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="purok">Purok/Area</label>
                                    <input type="text" class="form-control" name="purok" id="purok"
                                        placeholder="Purok">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="street">Street</label>
                                    <input type="text" class="form-control" name="street" id="street"
                                        placeholder="Street">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="phonenumber">Phone Number</label>
                                    <input type="text" class="form-control" name="phonenumber" id="phonenumber"
                                        placeholder="Phone Number">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="occupation">Occupation</label>
                                    <input type="text" class="form-control" name="occupation" id="occupation"
                                        placeholder="Occupation">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="birthplace">Birth Place</label>
                                    <input type="text" class="form-control" name="birthplace" id="birthplace"
                                        placeholder="Birth Place">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="birthdate">Birth Date:</label>
                                    <input type="date" class="form-control" name="birthdate">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="citizenship">Citizenship</label>
                                    <input type="text" class="form-control" name="citizenship" id="citizenship"
                                        placeholder="Citizenship">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="religion">Religion</label>
                                    <input type="text" class="form-control" name="religion" id="religion"
                                        placeholder="Religion">
                                </div>
                            </div>

                            <div class="button float-right">
                                <a href="/admin/resident" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Capture Profile Picture</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body box-profile">
                                <div class="centercamera">
                                    <div id="my_camera"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-primary snap" data-dismiss="modal"
                                value="Take Snapshot" onClick="take_snapshot()">
                        </div>
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

        Webcam.set({
            width: 350,
            height: 250,
            image_format: 'jpeg',
            jpeg_quality: 100
        });

        $(document).on('show.bs.modal', '#exampleModal', function(e) {
            Webcam.attach('#my_camera');
        })

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);

                $("#results").hide();
                document.getElementById('resultscamera').innerHTML = '<img src="' + data_uri +
                    '" class="profile-user-img img-fluid img-circle"/>';
            });
        }
    </script>
@endsection
