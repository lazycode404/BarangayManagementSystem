@extends('layouts.master')

@section('title', 'Barangay Information System')

@section('breadcrumbs')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Blotter Records</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Records List</li>
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
                        <i class="fa fa-list-ul" aria-hidden="true"></i> List of Records
                        <div class="float-right">
                            <a href="{{ url('admin/blotter/create') }}" class="btn btn-primary"><i
                                    class="fa fa-plus"></i>&nbsp;New
                                Complaint</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Incident Type</th>
                                    <th>DateTime Reported</th>
                                    <th>DateTime Incident</th>
                                    <th>Date Recordred</th>
                                    <th width="90">ACTION</th>
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
                                        <td>{{ date('M d, Y', strtotime($row->created_at)) }}</td>
                                        <td>
                                            <button class="btn btn-primary viewbtn" data-toggle="modal"
                                                data-target="#case-modal-{{ $row->id }}"><i
                                                    class="fa fa-eye"></i></button>
                                            <a href="{{ url('admin/blotter/edit/'.$row->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
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


    {{-- MODAL SHOW CASE --}}
    @foreach ($blotter as $row)
        <!-- Modal -->
        <div class="modal fade" id="case-modal-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="case-modal-{{$row->id}}"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Complainant</th>
                                    <th>Statement</th>
                                    <th>Respondent</th>
                                    <th>Involved</th>
                                    <th>Location</th>
                                    <th>Remarks</th>
                                    <th>Action Taken</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blotter as $rows)
                                    @if($row->id == $rows->id)
                                    <tr>
                                        <td>{{$rows->complainant}}</td>
                                        <td>{{$rows->complain_statement}}</td>
                                        <td>{{$rows->respondent}}</td>
                                        <td>{{$rows->person_involved}}</td>
                                        <td>{{$rows->location_incident}}</td>
                                        <td>{{$rows->remarks}}</td>
                                        <td>{{$rows->action_take}}</td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

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
