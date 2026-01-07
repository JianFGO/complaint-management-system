<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\StaffAuthController;
use App\Http\Controllers\StaffComplaintController;
use App\Http\Middleware\EnsureStaffLoggedIn;

/*
|--------------------------------------------------------------------------
| Default Entry Point
|--------------------------------------------------------------------------
| 
*/
Route::get('/', function () {
    return redirect()->route('complaints.create');
});

// =======================
// Public (Submit Complaint)
// =======================
Route::get('/complaints/create', [ComplaintController::class, 'create'])
    ->name('complaints.create');

Route::post('/complaints', [ComplaintController::class, 'store'])
    ->name('complaints.store');

// =======================
// Staff Authentication
// =======================
Route::get('/staff/login', [StaffAuthController::class, 'showLoginForm'])
    ->name('staff.login');

Route::post('/staff/login', [StaffAuthController::class, 'login'])
    ->name('staff.login.submit');

Route::post('/staff/logout', [StaffAuthController::class, 'logout'])
    ->name('staff.logout');

// =======================
// Staff Pages (Protected)
// =======================
Route::middleware([EnsureStaffLoggedIn::class])->group(function () {

    // Staff complaints list
    Route::get('/staff/complaints', [StaffComplaintController::class, 'index'])
        ->name('staff.complaints.index');

    // Staff complaint detail page
    Route::get('/staff/complaints/{complaint}', [StaffComplaintController::class, 'show'])
        ->name('staff.complaints.show');

    // Update complaint status
    Route::patch('/staff/complaints/{complaint}/status', [StaffComplaintController::class, 'updateStatus'])
        ->name('staff.complaints.updateStatus');
});
