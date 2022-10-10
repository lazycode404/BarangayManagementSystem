<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\BarangayModel;
use App\Http\Controllers\Controller;
use App\Models\OfficialsModel;
use Carbon\Carbon;

class OfficialsController extends Controller
{
    public function index()
    {   
        $barangay = BarangayModel::where('id', 1)->first();
        $officials = OfficialsModel::all();
        return view('admin.officials_list', compact('barangay', 'officials'));
    }

    public function store(Request $request)
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $middlename = $request->input('middlename');
        $age = $request->input('age');
        $email = $request->input('email');
        $gender = $request->input('gender');
        $position = $request->input('position');
        $civilstatus = $request->input('civilstatus');
        $birthdate = Carbon::parse($request->input('birthdate'));
        $birthplace = $request->input('birthplace');
        $phonenumber = $request->input('phonenumber');
        $purok = $request->input('purok');
        $termfrom = Carbon::parse($request->input('termfrom'));
        $termto = Carbon::parse($request->input('termto'));
        $address = $request->input('address');

        $officials = new OfficialsModel();

        $officials->firstname = $firstname;
        $officials->lastname = $lastname;
        $officials->middlename = $middlename;
        $officials->age = $age;
        $officials->email = $email;
        $officials->gender = $gender;
        $officials->position = $position;
        $officials->civil_status = $civilstatus;
        $officials->birth_date = $birthdate;
        $officials->birth_place = $birthplace;
        $officials->phone_number = $phonenumber;
        $officials->purok = $purok;
        $officials->term_from = $termfrom;
        $officials->term_to = $termto;
        $officials->address = $address;
        $officials->status = 1;
        
        $officials->save();

        return redirect('admin/officials_list')->with('success', 'Barangay Official Successfully Inserted!');
    }
}
