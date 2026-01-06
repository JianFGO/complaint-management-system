<?php

namespace App\Http\Controllers;

use App\Models\Complaint;

class StaffComplaintController extends Controller
{
    /**
     * Staff dashboard: list all complaints (newest first).
     */
    public function index()
    {
        $complaints = Complaint::orderBy('created_at', 'desc')->get();

        return view('staff.complaints.index', compact('complaints'));
    }
}
