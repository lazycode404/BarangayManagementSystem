<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\BarangayModel;
use App\Http\Controllers\Controller;
use App\Models\BlotterModel;
use App\Models\ResidentModel;
use Carbon\Carbon;

class BlotterController extends Controller
{
    public function index()
    {
        $barangay = BarangayModel::where('id', 1)->first();
        $blotter = BlotterModel::all();
        return view('admin.blotter.blotter', compact('barangay','blotter'));
    }

    public function create()
    {
        $barangay = BarangayModel::where('id', 1)->first();
        $residents = ResidentModel::all();
        return view('admin.blotter.blotter_create',compact('barangay','residents'));
    }

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $complainant = $request->input('complainant');
        $statement = $request->input('statement');
        $respondent = $request->input('respondent');
        $involved = implode(', ',$request->input('involved'));
        $locationIncident = $request->input('locationIncident');
        $datetimeIncident = Carbon::parse($request->input('datetimeIncident'));
        $incidentType = $request->input('incidentType');
        $status = $request->input('status');
        $datetimeReported = Carbon::parse($request->input('datetimeReported'));
        $remarks = $request->input('remarks');
        $actionTaken = $request->input('actionTaken');

        //dd($complainant,$statement,$respondent,$involved,$locationIncident,$datetimeIncident,$incidentType,$status,$datetimeReported,$remarks,$actionTaken);
        $blotter = new BlotterModel();

        $blotter->complainant = $complainant;
        $blotter->complain_statement = $statement;
        $blotter->respondent = $respondent;
        $blotter->person_involved = $involved;
        $blotter->location_incident = $locationIncident;
        $blotter->incident_type	= $incidentType;
        $blotter->dateTime_reported = $datetimeReported;
        $blotter->dateTime_incident = $datetimeIncident;
        $blotter->status = $status;
        $blotter->remarks = $remarks;
        $blotter->action_take = $actionTaken;

        $blotter->save();
        return redirect('admin/blotter')->with('success', 'Blotter Successfully Inserted!');

    }

    public function edit($id)
    {
        $barangay = BarangayModel::where('id', 1)->first();
        $blotterEdit = BlotterModel::where('id',$id)->first();
        $selected = explode(', ',$blotterEdit->person_involved);
        $residents = ResidentModel::all();
        return view('admin.blotter.blotter_edit', compact('barangay','blotterEdit','residents','selected'));
    }

    public function update(Request $request)
    {
        $blotterUpdate = BlotterModel::findOrFail($request->input('blotter_id'));

        date_default_timezone_set('Asia/Manila');
        $complainant = $request->input('complainant');
        $statement = $request->input('statement');
        $respondent = $request->input('respondent');
        $involved = implode(', ',$request->input('involved'));
        $locationIncident = $request->input('locationIncident');
        $datetimeIncident = Carbon::parse($request->input('datetimeIncident'));
        $incidentType = $request->input('incidentType');
        $status = $request->input('status');
        $datetimeReported = Carbon::parse($request->input('datetimeReported'));
        $remarks = $request->input('remarks');
        $actionTaken = $request->input('actionTaken');

        $blotterUpdate->complainant = $complainant;
        $blotterUpdate->complain_statement = $statement;
        $blotterUpdate->respondent = $respondent;
        $blotterUpdate->person_involved = $involved;
        $blotterUpdate->location_incident = $locationIncident;
        $blotterUpdate->incident_type	= $incidentType;
        $blotterUpdate->dateTime_reported = $datetimeReported;
        $blotterUpdate->dateTime_incident = $datetimeIncident;
        $blotterUpdate->status = $status;
        $blotterUpdate->remarks = $remarks;
        $blotterUpdate->action_take = $actionTaken;

        $blotterUpdate->save();

        return redirect('admin/blotter')->with('success', 'Blotter Successfully Updated');

    }
}
