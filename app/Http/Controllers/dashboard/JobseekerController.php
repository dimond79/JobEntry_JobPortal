<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Jobseeker;
use App\Models\JobUser;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JobseekerController extends Controller
{
    public function viewProfile()
    {
        $job_user = Auth::guard('jobseeker')->user();
        $profile = Jobseeker::where('job_user_id', $job_user->id)->with('phones')->first();
        // dd($profile);

        return view('dashboard.pages.jobseeker-profile-view', compact('job_user', 'profile'));
    }

    public function editProfile()
    {
        $job_user = Auth::guard('jobseeker')->user();
        $profile = Jobseeker::where('job_user_id', $job_user->id)->with('phones')->first();
        return view('dashboard.pages.jobseeker-profile-edit', compact('profile'));
    }

    public function updateProfile(Request $request)
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
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'profile_image' => 'nullable|image|max:2048'
        ]);

        $job_user = Auth::guard('jobseeker')->user();
        $profile = Jobseeker::where('job_user_id', $job_user->id)->with('phones')->first();

        // dd($validated);
        if ($request->hasFile('cv')) {
            if ($profile->cv && Storage::exists('public/' . $profile->cv)) {
                Storage::delete('public/' . $profile->cv);
            }

            $path = $request->file('cv')->store('jobseekers/cvs', 'public');
            $validated['cv'] = $path;
        }




        if ($request->hasFile('profile_image')) {
            if ($profile->profile_image && Storage::exists('public/' . $profile->profile_image)) {
                Storage::delete('public/' . $profile->profile_image);
            }

            $path = $request->file('profile_image')->store('jobseekers/profile_image', 'public');
            $validated['profile_image'] = $path;
        }



        $profile->update([
            'gender' => $validated['gender'],
            'dob' => $validated['dob'],
            'address' => $validated['address'],
            'education' => $validated['education'],
            'experience' => $validated['experience'],
            'skills' => $validated['skills'],
            'cv' => $validated['cv'] ?? $profile->cv,
            'profile_image' => $validated['profile_image'] ?? $profile->profile_image,


        ]);

        $profile->phones()->delete();

        foreach ($validated['phone'] as $phone) {

            if (!empty($phone)) {
                $profile->phones()->create([
                    'phone_no' => $phone,
                    'job_user_id' => $job_user->id,
                ]);
            }
            // $profile->phones->phone_no = $phone;

        }
        return redirect()->route('jobseeker.dashboard')->with('info', 'Profile Updated successfully.');
    }

    public function deleteProfile()
    {
        $job_user = Auth::guard('jobseeker')->user();


        $profile = Jobseeker::where('job_user_id', $job_user->id)->with('phones')->first();

        if (!$profile) {
            Auth::guard('jobseeker')->logout();
            return  redirect()->route('home.page')->with('error', 'Profile not found.');
        }
        DB::transaction(function () use ($job_user, $profile) {


            if ($profile->cv && Storage::exists('public/' . $profile->cv)) {
                Storage::delete('public/' . $profile->cv);
            }

            if ($profile->profile_image && Storage::exists('public/' . $profile->profile_image)) {
                Storage::delete('public/' . $profile->profile_image);
            }

            foreach ($profile->phones as $phone) {
                $phone->delete(); // soft delete
            }
            $profile->delete(); // soft delete
            $job_user->delete(); // soft delete
        });

        Auth::guard('jobseeker')->logout();

        return redirect()->route('home.page')->with('warning', 'Account deleted.');
    }
}
