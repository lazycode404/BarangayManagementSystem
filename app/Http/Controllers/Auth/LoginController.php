<?php

namespace App\Http\Controllers\Auth;

use App\Models\BarangayModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        $barangay = BarangayModel::where('id', 1)->first();
        return view('auth.login', compact('barangay'));
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    public function authenticated()
    {
        if(Auth::user()->role == 'admin')
        {
            return redirect('admin/dashboard');
        }
        else
        {
            Auth::logout();
            return abort(401);
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
