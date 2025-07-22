<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('frontend.auth.login-form');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // if (Auth::attempt($credentials)) {
        //     return redirect('/redirect');
        // }
        if (Auth::guard('jobseeker')->attempt($credentials)) {
            $user = Auth::guard('jobseeker')->user();
            // dd($user);

            if ($user->role === 'jobseeker') {
                return redirect()->route('jobseeker.dashboard');
            } elseif ($user->role === 'employer') {
                return redirect()->route('employer.dashboard');
            }

            return abort(403, 'Unknown Role');
        }

        return back()->withErrors(['email' => 'Invalid Credentials']);
    }

    public function jobseekerDashboard()
    {
        return view('dashboard.jobseeker-dashboard');
    }
    public function employerDashboard()
    {
        return view('dashboard.employer-dashboard');
    }
}
