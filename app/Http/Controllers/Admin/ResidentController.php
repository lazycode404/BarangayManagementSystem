<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BarangayModel;
use App\Models\ResidentModel;
use App\Http\Controllers\Controller;
use App\Models\BlotterModel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ResidentController extends Controller
{
    public function index()
    {
        $residents = ResidentModel::all();
        $barangay = BarangayModel::where('id', 1)->first();
        return view('admin.resident.resident_list', compact('barangay', 'residents'));
    }

    public function create()
    {
        $barangay = BarangayModel::where('id', 1)->first();
        return view('admin.resident.create_resident', compact('barangay'));
    }

    public function store(Request $request)
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $middlename = $request->input('middlename');

        if ($middlename == '') {
            $fullname = $firstname . ' ' . $lastname;
        } else {
            $middleInitial = Str::substr($middlename, 0, 1);
            $fullname = $firstname . ' ' . $middleInitial . '. ' . $lastname;
        }

        $email = $request->input('email');
        $age = $request->input('age');
        $gender = $request->input('gender');
        $civil_status = $request->input('civilstatus');
        $purok = $request->input('purok');
        $street = $request->input('street');
        $phone_number = $request->input('phonenumber');
        $occupation = $request->input('occupation');
        $birth_place = $request->input('birthplace');
        $birth_date = Carbon::parse($request->input('birthdate'));
        $citizeship = $request->input('citizenship');
        $religion = $request->input('religion');

        $img = $request->image;

        if ($img == '') {
            $resident = new ResidentModel();

            $resident->firstname = $firstname;
            $resident->lastname = $lastname;
            $resident->middlename = $middlename;
            $resident->fullname = $fullname;
            $resident->email = $email;
            $resident->age = $age;
            $resident->gender = $gender;
            $resident->civil_status = $civil_status;
            $resident->purok = $purok;
            $resident->street = $street;
            $resident->phone_number = $phone_number;
            $resident->occupation = $occupation;
            $resident->birth_place = $birth_place;
            $resident->birth_date = $birth_date;
            $resident->citizenship = $citizeship;
            $resident->religion = $religion;
            $resident->save();
    
            return redirect('admin/resident')->with('success', 'Resident Successfully Inserted!');
        } else {
            $destinationPath = 'images/residents/';
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];

            $image_base64 = base64_decode($image_parts[1]);
            $filename = uniqid() . '.png';

            $file = $destinationPath . $filename;
            Storage::disk('public_uploads')->put($file, $image_base64);


            $resident = new ResidentModel();

            $resident->image = $filename;
            $resident->firstname = $firstname;
            $resident->lastname = $lastname;
            $resident->middlename = $middlename;
            $resident->fullname = $fullname;
            $resident->email = $email;
            $resident->age = $age;
            $resident->gender = $gender;
            $resident->civil_status = $civil_status;
            $resident->purok = $purok;
            $resident->street = $street;
            $resident->phone_number = $phone_number;
            $resident->occupation = $occupation;
            $resident->birth_place = $birth_place;
            $resident->birth_date = $birth_date;
            $resident->citizenship = $citizeship;
            $resident->religion = $religion;
            $resident->save();
    
            return redirect('admin/resident')->with('success', 'Resident Successfully Inserted!');
        }

    }

    public function profile($id)
    {
        $barangay = BarangayModel::where('id', 1)->first();
        $residentprofile = ResidentModel::where('id', $id)->first();
        $residentFullname = $residentprofile->fullname;
        $blotter = BlotterModel::where('person_involved', 'LIKE', '%'.$residentFullname.'%')->get();
        return view('admin.resident.profile', compact('barangay', 'residentprofile','blotter'));
    }

    public function delete(Request $request)
    {
        $residentDelete = ResidentModel::find($request->user_id);

        if ($residentDelete) {
            File::delete(public_path('/assets/images/residents/' . $residentDelete->image));
            $residentDelete->delete();
            return redirect('admin/resident')->with('success', 'Resident Successfully Deleted!');
        } else {
            return redirect('admin/resident')->with('error', 'No Resident ID Found!');
        }
        //return($request->input('user_id'));
        //return($residentDelete->image);
    }

    public function edit($id)
    {
        $residentall = ResidentModel::all();
        $barangay = BarangayModel::where('id', 1)->first();
        $residentprofileedit = ResidentModel::where('id', $id)->first();
        return view('admin.resident.resident_edit', compact('barangay', 'residentprofileedit', 'residentall'));
    }
    public function update(Request $request)
    {
        
        $profilepic = $request->image;

        if ($profilepic === null) {

            $residentUpdate = ResidentModel::findOrFail($request->input('residentID'));

            $firstname = $request->input('firstname');
            $lastname = $request->input('lastname');
            $middlename = $request->input('middlename');
            $email = $request->input('email');
            $age = $request->input('age');
            $gender = $request->input('gender');
            $civil_status = $request->input('civilstatus');
            $purok = $request->input('purok');
            $street = $request->input('street');
            $phone_number = $request->input('phonenumber');
            $occupation = $request->input('occupation');
            $birth_place = $request->input('birthplace');
            $birth_date = Carbon::parse($request->input('birthdate'));
            $citizeship = $request->input('citizenship');
            $religion = $request->input('religion');

            $residentUpdate->firstname = $firstname;
            $residentUpdate->lastname = $lastname;
            $residentUpdate->middlename = $middlename;
            $residentUpdate->email = $email;
            $residentUpdate->age = $age;
            $residentUpdate->gender = $gender;
            $residentUpdate->civil_status = $civil_status;
            $residentUpdate->purok = $purok;
            $residentUpdate->street = $street;
            $residentUpdate->phone_number = $phone_number;
            $residentUpdate->occupation = $occupation;
            $residentUpdate->birth_place = $birth_place;
            $residentUpdate->birth_date = $birth_date;
            $residentUpdate->citizenship = $citizeship;
            $residentUpdate->religion = $religion;

            $residentUpdate->save();

            return redirect('admin/resident')->with('success', 'Resident Successfully Updated!');
        } else {
            $residentUpdate = ResidentModel::findOrFail($request->input('residentID'));

            File::delete(public_path('/assets/images/residents/' . $residentUpdate->image));

            $firstname = $request->input('firstname');
            $lastname = $request->input('lastname');
            $middlename = $request->input('middlename');
            $email = $request->input('email');
            $age = $request->input('age');
            $gender = $request->input('gender');
            $civil_status = $request->input('civilstatus');
            $purok = $request->input('purok');
            $street = $request->input('street');
            $phone_number = $request->input('phonenumber');
            $occupation = $request->input('occupation');
            $birth_place = $request->input('birthplace');
            $birth_date = Carbon::parse($request->input('birthdate'));
            $citizeship = $request->input('citizenship');
            $religion = $request->input('religion');

            $img = $request->image;
            $destinationPath = 'images/residents/';
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];

            $image_base64 = base64_decode($image_parts[1]);
            $filename = uniqid() . '.png';

            $file = $destinationPath . $filename;
            Storage::disk('public_uploads')->put($file, $image_base64);

            $residentUpdate->image = $filename;
            $residentUpdate->firstname = $firstname;
            $residentUpdate->lastname = $lastname;
            $residentUpdate->middlename = $middlename;
            $residentUpdate->email = $email;
            $residentUpdate->age = $age;
            $residentUpdate->gender = $gender;
            $residentUpdate->civil_status = $civil_status;
            $residentUpdate->purok = $purok;
            $residentUpdate->street = $street;
            $residentUpdate->phone_number = $phone_number;
            $residentUpdate->occupation = $occupation;
            $residentUpdate->birth_place = $birth_place;
            $residentUpdate->birth_date = $birth_date;
            $residentUpdate->citizenship = $citizeship;
            $residentUpdate->religion = $religion;

            $residentUpdate->save();

            return redirect('admin/resident')->with('success', 'Resident Successfully Updated!');
        }
    }
}
