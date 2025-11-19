<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Member; // Your custom member model

class MemberLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // your login Blade view
    }

    public function login(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'password' => 'required',
        ]);

        // Find member by ID
        $member = Member::where('member_id_no', $request->id)->first();

        if ($member && $member->password === $request->password) {
            // Log in manually
            Auth::login($member); 
            return redirect()->intended('mem-dashboard');
        }

        // Login failed
        return back()->withErrors([
            'id' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
