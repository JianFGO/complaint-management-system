<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

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

    /**
     * Show one complaint detail page.
     * Route model binding will inject the Complaint model automatically.
     */
    public function show(Complaint $complaint)
    {
        return view('staff.complaints.show', compact('complaint'));
    }

    /**
     * Update complaint status (PATCH).
     */
    public function updateStatus(Request $request, Complaint $complaint)
    {
        $validated = $request->validate([
            'status' => 'required|in:New,In Progress,Resolved,Closed',
        ]);

        $complaint->update([
            'status' => $validated['status'],
        ]);

        return redirect()
            ->route('staff.complaints.show', $complaint->id)
            ->with('success', 'Status updated successfully.');
    }
}
