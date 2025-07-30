<?php

namespace App\Http\Controllers;

use App\Models\JobUser;
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

        $user = JobUser::withTrashed()->where('email', $request->email)->first();

        if ($user && $user->trashed()) {
            return back()->with('error', 'Your account has been deactivated. Contact JobEntry.');
            // return back()->withErrors(['email' => 'Your account has been deactivated.']);
        }

        if (Auth::guard('jobseeker')->attempt($credentials)) {
            $user = Auth::guard('jobseeker')->user();
            // dd($user);

            if ($user->role === 'jobseeker') {
                return redirect()->route('jobseeker.dashboard')->with("success", "Login Successfully.");
            } elseif ($user->role === 'employer') {
                return redirect()->route('employer.dashboard', $user->name)->with("success", "Login Successfully.");
            }

            return abort(403, 'Unknown Role');
        }

        return back()->withErrors(['email' => 'Invalid Credentials']);
    }

    public function jobseekerDashboard()
    {
        return view('dashboard.home.jobseeker-dashboard');
    }
    public function employerDashboard()
    {
        return view('dashboard.home.employer-dashboard');
    }
}
