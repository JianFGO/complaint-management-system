<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    /**
     * Show the complaint submission form.
     */
    public function create()
    {
        return view('complaints.create');
    }

    /**
     * Store a newly submitted complaint.
     */
    public function store(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Create the complaint
        Complaint::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'description' => $validated['description'],
            'status' => 'New',
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Your complaint has been submitted successfully.');
    }
}
