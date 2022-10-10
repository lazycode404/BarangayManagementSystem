<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\BarangayModel;
use App\Models\ResidentModel;
use App\Http\Controllers\Controller;

class CertificateController extends Controller
{
    public function index()
    {
        $barangay = BarangayModel::where('id', 1)->first();
        $residents = ResidentModel::all();
        return view('admin.certificate.issue_certificate',compact('barangay','residents'));
    }
}
