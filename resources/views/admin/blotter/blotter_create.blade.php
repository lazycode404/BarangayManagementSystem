@extends('layouts.master')

@section('title', 'Barangay Information System')

@section('breadcrumbs')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Create Blotter</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Create Blotter</li>
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
        <!-- SELECT2 EXAMPLE -->
        {{-- step 1 --}}
        <form action="{{ url('admin/blotter/store') }}" method="POST">
            @csrf
            <div class="card card-default">
                <div class="card-header pt-3">
                    <h3 class="card-title">Step 1 <small>Complainant</small></h3>

                    <div class="card-tools">

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><b>Select Complainant</b></label>
                                <select name="complainant" class="form-control js-example-theme-single">
                                    <option value="" selected disabled>Select Complainant</option>
                                    @foreach ($residents as $row)
                                        <option
                                            value="{{$row->fullname}}">
                                            {{ $row->firstname }} @if ($row->middlename == null)
                                            @else
                                                {{ substr($row->middlename, 0, 1) }}.
                                            @endif {{ $row->lastname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label><b>Complain Statement</b></label>
                                <textarea name="statement" class="form-control" id="summernote">
                            
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div>

            {{-- step 2 --}}
            <div class="card card-default">
                <div class="card-header pt-3">
                    <h3 class="card-title">Step 2 <small>Respondent</small></h3>

                    <div class="card-tools">

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><b>Select Respondent</b></label>
                                <select name="respondent" class="form-control js-example-theme-single">
                                    <option value="" selected disabled>Select Complainant</option>
                                    @foreach ($residents as $row)
                                        <option value="{{$row->fullname}}">
                                            {{ $row->firstname }} @if ($row->middlename == null)
                                            @else
                                                {{ substr($row->middlename, 0, 1) }}.
                                            @endif {{ $row->lastname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div>


            {{-- step 3 --}}
            <div class="card card-default">
                <div class="card-header pt-3">
                    <h3 class="card-title">Step 3 <small>Person Involved (Ex: )</small></h3>

                    <div class="card-tools">

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Person Involved</label>
                                <select name="involved[]" class="form-control js-example-theme-multiple" multiple="multiple"
                                    data-placeholder="Select Person Involved">
                                    @foreach ($residents as $row)
                                        <option value="{{$row->fullname}}">
                                            {{ $row->firstname }} @if ($row->middlename == null)
                                            @else
                                                {{ substr($row->middlename, 0, 1) }}.
                                            @endif {{ $row->lastname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">

                    {{-- step 4 --}}
                    <div class="card card-default">
                        <div class="card-header pt-3">
                            <h3 class="card-title">Step 4 <small>Narative report and incident details</small></h3>

                            <div class="card-tools">

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label><b>Location of Incident</b></label>
                                        <input type="text" name="locationIncident" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Date and Time of Incident:</label>
                                        <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                            <input type="datetime-local" name="datetimeIncident" value=""
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label><b>Incident Type</b></label>
                                        <input type="text" name="incidentType" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><b>Status</b></label>
                                        <select class="form-control" name="status">
                                            <option selected>Select Status</option>
                                            <option value="New">New</option>
                                            <option value="Ongoing">Ongoing</option>
                                            <option value="Resolved">Resolved</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Date and Time of Reported:</label>
                                        <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                            <input type="datetime-local" name="datetimeReported" value=""
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><b>Remarks</b></label>
                                        <select class="form-control" name="remarks">
                                            <option selected>Select Remarks</option>
                                            <option value="Open">Open</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Closed">Closed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label><b>Action Taken</b></label>
                                        <textarea class="form-control" name="actionTaken" id="summernote2">
                                
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                <a href="/admin/blotter" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </form>
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
