<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\JobUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EmployerController extends Controller
{
    public function form()
    {
        $job_categories = Category::get();

        return view('frontend.pages.job_post', compact('job_categories'));
    }

    public function companyRegister()
    {
        return view('dashboard.pages.company-register');
    }

    public function storeCompanyProfile(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'location' => 'required|string',
                'email' => 'required|email',
                'number' => 'required|string|max:30',
                'description' => 'required|string|max:500',
                'logo' => 'nullable|image|max:2048',

            ]);

            if ($request->hasFile('logo')) {
                $validated['logo'] = $request->file('logo')->store('employer/logo', 'public');
            } else {
                $validated['logo'] = "employer/default.png";
            }
            $user = Auth::guard('jobseeker')->user();
            $validated['job_user_id'] = $user->id;


            $validated['slug'] = Str::slug($request->name);

            Company::create($validated);

            return redirect()->route('employer.dashboard')->with('success', 'Company Registered');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function employerJobList()
    {
        $job_user = Auth::guard('jobseeker')->user();
        // $company = $job_user->company;
        // $jobs = $company ? $company->jobs()->get() : collect();

        $jobs = Job::where('user_id', $job_user->id)->get();
        return view('dashboard.pages.employer-job-list', compact('jobs'));
    }



    public function employerViewApplication($slug)
    {
        // $user = Auth::guard('jobseeker')->user();
        // $job_applications = Job::with('applications')->where('user_id', $user->id)->get();
        // dd($job_applications);
        // $jobseeker_id = JobUser::where('id', $job_applications->applications->job_user_id)->first();
        // dd($jobseeker_id);

        $job_applications = Job::where('slug', $slug)->with('applications.jobUser')->get();
        // dd($job_applications);
        return view('dashboard.pages.employer-view-applications', compact('job_applications'));
    }

    public function downloadCV(JobApplication $application)
    {
        // dd($application);
        $job_user = $application->jobUser;

        if ($job_user && $job_user->jobseeker) {
            // $job_user->jobseeker->increment('cv_download_count');

            // $job_user->jobseeker->refresh();
            // dd($job_user->jobseeker->increment('cv_download_count'));

            DB::table('jobseekers')->where('id', $job_user->jobseeker->id)->increment('cv_download_count');


            $cv_path = $application->cv_path;

            if ($cv_path && Storage::disk('public')->exists($cv_path)) {
                return Storage::disk('public')->download($cv_path);
            }
        }
        return redirect()->back()->with('error', 'CV not found.');
    }

    public function updateJobseekerStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'string|in:pending,interviewed,rejected,offered',
        ]);

        JobApplication::where('id', $id)->update([
            'status' => $validated['status'],
        ]);

        return redirect()->back()->with('info', 'Status updated successfully.');
    }
}
