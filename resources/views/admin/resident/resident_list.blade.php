@extends('layouts.master')

@section('title', 'Barangay Information System')

@section('breadcrumbs')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Resident Record</h1>
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
                                    <th width="250">NAME</th>
                                    <th width="120">GENDER</th>
                                    <th width="120">AGE</th>
                                    <th width="120">BIRTHDATE</th>
                                    <th width="120">PUROK</th>
                                    <th width="120">STREET</th>
                                    <th width="100">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($residents as $row)
                                    <tr>
                                        <td class="text-center"><img class="img-circle"
                                                src="@if($row->image === null) {{ asset('assets/images/user.png') }} @else {{ asset('assets/images/residents/' . $row->image) }} @endif" width="50"
                                                height="50" alt=""></td>
                                        <td>{{ $row->firstname }} @if ($row->middlename == null)
                                            @else
                                                {{ substr($row->middlename, 0, 1) }}.
                                            @endif {{ $row->lastname }}</td>
                                        <td>{{ $row->gender }}</td>
                                        <td>{{ $row->age }}</td>
                                        <td>{{ date('M d, Y', strtotime($row->birth_date)) }}</td>
                                        <td>{{ $row->purok }}</td>
                                        <td>{{ $row->street }}</td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="{{ url('admin/resident/profile/' . $row->id) }}"><i
                                                    class="fa fa-eye"></i></a>
                                            <a href="{{ url('admin/resident/edit/'.$row->id) }}" class="btn btn-success"><i
                                                    class="fa fa-edit"></i></a>
                                            <button class="btn btn-danger deletebtn" value="{{ $row->id }}">
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


    <!-- DELETE USER MODAL -->
    <div class="modal fade" id="exampleModalLongDelete" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/resident/delete') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="user_id" id="user_id">
                        Are you sure you want to delete this user?
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close" class="btn btn-secondary">Close</button>
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

        $(document).ready(function() {
            $('.deletebtn').click(function(e) {
                e.preventDefault();

                var user_id = $(this).val();
                $('#user_id').val(user_id);

                console.log(user_id);

                $('#exampleModalLongDelete').modal('show');
            })
        })

        $(document).ready(function() {
            $('#close').click(function(e) {
                e.preventDefault();

                $('#exampleModalLongDelete').modal('hide');
            })
        })
    </script>
@endsection
