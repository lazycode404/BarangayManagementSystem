<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\BarangayModel;
use App\Models\OfficialsModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $barangay = BarangayModel::where('id', 1)->first();
        $officials = DB::table('tbl_officials')->count();
        $residents = DB::table('tbl_residents')->count();
        $blotter = DB::table('tbl_blotter')->count();
        return view('admin.dashboard',compact('barangay','officials','residents','blotter'));
    }
}
