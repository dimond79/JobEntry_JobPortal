<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\Jobseeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationStatusController extends Controller
{
    public function show()
    {
        $job_user = Auth::guard('jobseeker')->user();
        $application_detail = JobApplication::with('job')->where('job_user_id', $job_user->id)->get();
        // dd($application_detail);
        $applied_count = $application_detail ? $application_detail->count() : 0;
        $cv_download = Jobseeker::where('job_user_id', $job_user->id)->first();
        return view('dashboard.pages.application-status', compact('applied_count', 'application_detail', 'cv_download'));
    }
}
