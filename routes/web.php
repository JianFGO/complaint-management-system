<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;


// Default Laravel welcome page
Route::get('/', function () {
    return view('welcome');
});

// Submit Complaint (Public)
Route::get('/complaints/create', [ComplaintController::class, 'create'])
    ->name('complaints.create');

Route::post('/complaints', [ComplaintController::class, 'store'])
    ->name('complaints.store');