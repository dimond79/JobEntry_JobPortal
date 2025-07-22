<?php

namespace App\Http\Controllers;

use App\Models\JobUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use TCG\Voyager\Models\Role;

class RegisterController extends Controller
{
    public function showJobSeekerRegisterForm()
    {
        return view('frontend.auth.jobseeker-register-form');
    }

    public function registerJobSeeker(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email',
            'password' => 'required|min:4'


        ]);
        // dd($data);

        $user = JobUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'jobseeker',

        ]);
        // dd($user);

        // auth()->login($user);
        // Auth::login($user);
        Auth::guard('jobseeker')->login($user);

        return redirect()->route('dashboard.profile');
    }

    public function showEmployerForm()
    {
        return view('frontend.auth.employer-register-form');
    }

    public function registerEmployer(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        $user = JobUser::create([
            "name" => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'employer',
        ]);

        // auth()->login($user);
        // Auth::login($user);
        Auth::guard('jobseeker')->login($user);

        return redirect()->route('employer.dashboard');
    }
}
