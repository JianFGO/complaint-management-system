<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('staff.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // PoC credentials (change these if you want)
        $validUsername = 'staff';
        $validPassword = 'password123';

        if (
            $validated['username'] === $validUsername &&
            $validated['password'] === $validPassword
        ) {
            $request->session()->put('staff_logged_in', true);
            $request->session()->put('staff_username', $validated['username']);

            return redirect()->route('staff.complaints.index');
        }

        return back()
            ->withErrors(['login' => 'Invalid username or password'])
            ->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['staff_logged_in', 'staff_username']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('staff.login');
    }
}
