@extends('layouts.master')

@section('title', 'Barangay Information System')

@section('breadcrumbs')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Issue Certificate</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Resident List</li>
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
                        <i class="fa fa-list-ul" aria-hidden="true"></i> List of Residents
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="20">PHOTO</th>
                                    <th width="300">NAME</th>
                                    <th width="50">GENDER</th>
                                    <th width="300">ISSUE CERTIFICATE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($residents as $row)
                                    <tr>
                                        <td class="text-center"><img class="img-circle"
                                                src="@if ($row->image === null) {{ asset('assets/images/user.png') }} @else {{ asset('assets/images/residents/' . $row->image) }} @endif"
                                                width="50" height="50" alt=""></td>
                                        <td>{{ $row->fullname }}</td>
                                        <td>{{ $row->gender }}</td>
                                        <td>
                                            <button class="btn btn-primary brgy" value="{{ $row->id }}">
                                                <i class="fa fa-address-card" aria-hidden="true"></i> Clearance
                                            </button>
                                            <button class="btn btn-success">
                                                <i class="fa fa-certificate" aria-hidden="true"></i> Indigency
                                            </button>
                                            <button class="btn btn-danger">
                                                <i class="fa fa-indent" aria-hidden="true"></i> Business Permit
                                            </button>
                                            <button class="btn btn-warning">
                                                <i class="fa fa-address-book" aria-hidden="true"></i> Residency
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Barangay Clearance</h5>
                    <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" id="brgyClearance" name="brgyClearance">
                </div>
                <div class="modal-footer">
                    <button type="button" id="closeModal" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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


            $('.brgy').click(function(e) {
                e.preventDefault();

                var bgryClearance = $(this).val();
                $('#exampleModal').modal('show');

                $('#brgyClearance').val(bgryClearance);

                console.log(bgryClearance);
            })

            $('#closeModal').click(function(e) {
                e.preventDefault();
                $('#exampleModal').modal('hide');
            })

            $('#close').click(function(e){
                e.preventDefault();
                $('#exampleModal').modal('hide');
            })
        });
    </script>
@endsection
