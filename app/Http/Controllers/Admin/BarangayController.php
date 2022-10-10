<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\BarangayModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class BarangayController extends Controller
{
    public function index()
    {
        $barangay = BarangayModel::where('id', 1)->first();
        return view('admin.barangay', compact('barangay'));
    }

    public function addInformation(Request $request)
    {

        $barangayUpodate = new BarangayModel();

        $logo = $request->file('logo');

        if ($logo === null) {

            $idexist = BarangayModel::where('id', '=', 1)->first();

            if ($idexist === null) {

                $barangay = new BarangayModel();
                $brgy = $request->input('barangay');
                $municipality = $request->input('municipality');
                $province = $request->input('province');
                $phonenumber = $request->input('phonenumber');
                $emailAddress = $request->input('emailAddress');

                $barangay->barangay = $brgy;
                $barangay->municipality = $municipality;
                $barangay->province = $province;
                $barangay->phonenumber = $phonenumber;
                $barangay->emailAddress = $emailAddress;

                $barangay->save();

                return redirect('admin/barangay')->with('success', 'Barangay Information Successfully Inserted!');
            } else {

                $barangayUpodate = BarangayModel::findOrFail('1');

                $brgy = $request->input('barangay');
                $municipality = $request->input('municipality');
                $province = $request->input('province');
                $phonenumber = $request->input('phonenumber');
                $emailAddress = $request->input('emailAddress');

                $barangayUpodate->barangay = $brgy;
                $barangayUpodate->municipality = $municipality;
                $barangayUpodate->province = $province;
                $barangayUpodate->phonenumber = $phonenumber;
                $barangayUpodate->emailAddress = $emailAddress;

                $barangayUpodate->save();

                return redirect('admin/barangay')->with('success', 'Barangay Information Successfully Updated!');
            }
        } else {

            $idexist = BarangayModel::where('id', '=', 1)->first();

            if ($idexist === null) {
                $brgyLogo = $request->file('logo')->getClientOriginalName();
                $brgy = $request->input('barangay');
                $municipality = $request->input('municipality');
                $province = $request->input('province');
                $phonenumber = $request->input('phonenumber');
                $emailAddress = $request->input('emailAddress');

                $destinationPath = public_path() . '/assets/images/';

                $validateFile = $request->validate([
                    'logo' => 'mimes:jpeg,jpg,png|max:10000',
                ]);

                if ($validateFile) {
                    $logo->move($destinationPath, $brgyLogo);
                    $barangayUpodate->logo = $brgyLogo;
                    $barangayUpodate->barangay = $brgy;
                    $barangayUpodate->municipality = $municipality;
                    $barangayUpodate->province = $province;
                    $barangayUpodate->phonenumber = $phonenumber;
                    $barangayUpodate->emailAddress = $emailAddress;

                    $barangayUpodate->save();
                    return redirect('admin/barangay')->with('success', 'Barangay Information Successfully Inserted!');
                } else {
                    return redirect('admin/barangay');
                }
            }
            else
            {
                $barangayUpodate = BarangayModel::findOrFail('1');
                $brgyLogo = $request->file('logo')->getClientOriginalName();
                $brgy = $request->input('barangay');
                $municipality = $request->input('municipality');
                $province = $request->input('province');
                $phonenumber = $request->input('phonenumber');
                $emailAddress = $request->input('emailAddress');

                $destinationPath = public_path() . '/assets/images/';

                $validateFile = $request->validate([
                    'logo' => 'mimes:jpeg,jpg,png|max:10000',
                ]);

                if ($validateFile) {
                    $logo->move($destinationPath, $brgyLogo);
                    $barangayUpodate->logo = $brgyLogo;
                    $barangayUpodate->barangay = $brgy;
                    $barangayUpodate->municipality = $municipality;
                    $barangayUpodate->province = $province;
                    $barangayUpodate->phonenumber = $phonenumber;
                    $barangayUpodate->emailAddress = $emailAddress;

                    $barangayUpodate->save();
                    return redirect('admin/barangay')->with('success', 'Barangay Information Successfully Updated!');
                } else {
                    return redirect('admin/barangay');
                }
            }
        }
    }
}
