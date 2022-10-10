@extends('layouts.master')

@section('title', 'Barangay Information System')

@section('breadcrumbs')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Manage Barangay Officials</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Official List</li>
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
</style>
@section('content')
    <div class="container-fluid">
        @include('layouts.components.flashmessages')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="addnew float-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
                                    class="fa fa-plus"></i>&nbsp;New
                                Official</button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="20">PHOTO</th>
                                    <th>NAME</th>
                                    <th>POSITION</th>
                                    <th>TERM FROM-TO</th>
                                    <th>PUROK</th>
                                    <th>STATUS</th>
                                    <th width="90">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($officials as $row)
                                    <tr>
                                        <td class="text-center"><img src="{{ asset('assets/images/user.png') }}"
                                                width="50" height="50" alt=""><a href=""></td>
                                        <td>{{ $row->firstname }} @if($row->middlename == null)@else {{ substr($row->middlename, 0, 1) }}.@endif {{ $row->lastname }}
                                        </td>
                                        <td>{{ $row->position }}</td>
                                        <td>{{ date('M d, Y', strtotime($row->term_from)) }} -
                                            {{ date('M d, Y', strtotime($row->term_to)) }}</td>
                                        <td>{{ $row->purok }}</td>
                                        <td>
                                            @if ($row->status == 1)
                                                <i class="fa fa-circle text-success"></i> Active
                                            @else
                                                <i class="fa fa-circle text-danger"></i> InActive
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-success">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ url('admin/officials_list/create') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" name="firstname" id="firstname"
                                    placeholder="Firs tname">
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
                                <label for="age">Age</label>
                                <input type="text" class="form-control" name="age" id="age" placeholder="Age">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email">
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
                                <label for="position">Position</label>
                                <select class="form-control" name="position">
                                    <option selected>Select Barangay Position</option>
                                    <option value="Punong Barangay">Punong Barangay</option>
                                    <option value="Kagawad">Kagawad</option>
                                    <option value="Secretary">Secretary</option>
                                    <option value="Treasurer">Treasurer</option>
                                    <option value="SK Chairman">SK Chairman</option>
                                </select>
                            </div>
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
                                <label for="birthdate">Birth Date:</label>
                                <input type="date" class="form-control" name="birthdate">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="birthplace">Birth Place</label>
                                <input type="text" class="form-control" name="birthplace" placeholder="Birth Place">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="phonenumber">Phone Number</label>
                                <input type="text" class="form-control" name="phonenumber"
                                    placeholder="Phone Number">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="purok">Purok</label>
                                <input type="text" class="form-control" name="purok" placeholder="Purok">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="termfrom">Term From:</label>
                                <input type="date" class="form-control" name="termfrom">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="termto">Term To:</label>
                                <input type="date" class="form-control" name="termto">
                            </div>
                        </div>

                        <div class="form-row">
                            <label for="address">Address</label>
                            <textarea name="address" class="form-control" id="address" cols="20" rows="2" placeholder="Address"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
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
