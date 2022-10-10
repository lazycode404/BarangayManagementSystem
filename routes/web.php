<?php


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\BlotterController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\BarangayController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ResidentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OfficialsController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'showLoginForm'])->name('showLogin');

Auth::routes();

// REGISTRATION FOR ADMIN ROLE
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');



//ADMIN WEB PAGE
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index']);

    //BARANGAY
    Route::get('/barangay', [BarangayController::class, 'index']);
    Route::post('barangay/create', [BarangayController::class, 'addInformation']);

    //OFFICIALS
    Route::get('/officials_list', [OfficialsController::class, 'index']);
    Route::post('officials_list/create', [OfficialsController::class, 'store']);

    //RESIDENT
    Route::get('/resident', [ResidentController::class, 'index']);
    Route::get('resident/create', [ResidentController::class, 'create']);
    Route::post('resident/store', [ResidentController::class, 'store']);
    Route::get('resident/profile/{id}', [ResidentController::class, 'profile']);
    Route::post('resident/delete', [ResidentController::class, 'delete']);
    Route::get('resident/edit/{id}', [ResidentController::class, 'edit']);
    Route::post('resident/update', [ResidentController::class, 'update']);

    //BLOTTER
    Route::get('/blotter', [BlotterController::class, 'index']);
    Route::get('blotter/create', [BlotterController::class, 'create']);
    Route::post('blotter/store', [BlotterController::class, 'store']);
    Route::get('blotter/edit/{id}', [BlotterController::class, 'edit']);
    Route::post('blotter/update', [BlotterController::class, 'update']);

    //CERTIFICATE
    Route::get('certificate/issue_certificate',[CertificateController::class, 'index']);

});