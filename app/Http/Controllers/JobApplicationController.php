<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use App\Models\Jobseeker;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    public function show($slug)
    {
        $job_user = Auth::guard('jobseeker')->user();
        $jobseeker_details = Jobseeker::where('job_user_id', $job_user->id)->with('phones')->first();
        return view('frontend.pages.job_application', compact('job_user', 'jobseeker_details', 'slug'));
    }

    public function apply(Request $request, $slug)
    {

        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'phone_no' => 'required|string',
            'cv_path' => 'nullable|file|max:2048',
            'message' => 'nullable|string|max:1000',

        ]);

        $job_user = Auth::guard('jobseeker')->user();
        $jobseeker_details = Jobseeker::where('job_user_id', $job_user->id)->first();
        $job_detail = Job::where('slug', $slug)->firstOrFail();

        // dd($path);
        // $path = $jobseeker_details->cv;
        // dd($path);
        $validated['cv_path'] = $jobseeker_details->cv;

        if ($request->hasFile('cv_path')) {
            $path = $request->file('cv_path')->store('app_cvs', 'public');
            $validated['cv_path'] = $path;
        }






        JobApplication::create([
            'cv_path' => $validated['cv_path'],
            'status' => "pending",
            'job_id' => $job_detail->id,
            'jobseeker_id' => $jobseeker_details->id,
            'message' =>  $validated['message'],
            'job_user_id' => $job_user->id,

        ]);

        return redirect()->route('job.lists')->with("success", "Job applied successfully.");
    }
}
