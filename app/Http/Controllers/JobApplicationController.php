<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class JobApplicationController extends Controller
{
    public function show()
    {
        return view('frontend.pages.job_application');
    }

    public function jobDetail($slug)
    {
        $job_detail = Job::where('slug', $slug)->firstOrFail();
        $days_left = now()->diffInDays($job_detail->date_line, false);
        // dd($days_left);
        return view('frontend.pages.job_detail', compact('job_detail', 'days_left'));
    }
}
