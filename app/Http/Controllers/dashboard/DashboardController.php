<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Jobseeker;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function showProfile()
    {
        $user = Auth::guard('jobseeker')->user();
        // dd($user);
        $profile = $user->jobseeker;
        // dd($profile);
        return view('dashboard.pages.jobseeker-profile', compact('profile'));
    }

    public function storeProfile(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'required|array|min:1',
            'phone.*' => 'required|string',
            'gender' => 'required|string|in:male,female,other',
            'dob' => 'required|date',
            'address' => 'required|string|max:255',
            'education' => 'required|string|max:1000',
            'experience' => 'required|string|max:1000',
            'skills' => 'required|string|max:1000',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'profile_image' => 'nullable|image|max:2048'
        ]);
        // dd($request->toArray());

        $jobseeker_user = Auth::guard('jobseeker')->user();
        // $jobseeker_phone = $jobseeker_user->jobseeker?->phones;
        // dd($jobseeker_phone);

        // Prevent multiple profiles
        if ($jobseeker_user->jobseeker) {
            return back()->withErrors(['profile' => 'You have already created your profile.']);
        }

        if ($request->hasFile('cv')) {

            $validated['cv'] = $request->file('cv')->store('jobseekers/cvs', 'public');
        }

        if ($request->hasFile('profile_image')) {

            $validated['profile_image'] = $request->file('profile_image')->store('jobseekers/profile_image', 'public');
        }

        // $jobseeker_user->update($validated);
        $profile = Jobseeker::create([
            'gender' => $validated['gender'],
            'dob' => $validated['dob'],
            'address' => $validated['address'],
            'education' => $validated['education'],
            'experience' => $validated['experience'],
            'skills' => $validated['skills'],
            'cv' => $validated['cv'],
            'profile_image' => $validated['profile_image'] ?? null,
            'job_user_id' => $jobseeker_user->id,
        ]);

        // $test = $jobseeker_user->jobseeker->id;
        // dd($test);

        foreach ($validated['phone'] ?? [] as $phone) {


            if (!empty($phone)) {
                $profile->phones()->create([
                    'phone_no' => $phone,
                    // 'jobseeker_id' => $jobseeker_user->jobseeker->id,
                    'job_user_id' => $jobseeker_user->id,
                ]);
            }
        }


        return redirect()->route('jobseeker.dashboard')->with('success', 'Profile updated successfully.');
    }
}
