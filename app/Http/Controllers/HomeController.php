<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Job;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $job_types = Job::select('type')->distinct()->get();
        // dd($job_types);

        $jobs = Job::select('location')->distinct()->get();
        // dd($jobs->toArray());
        $categories = Category::withCount('jobs')->get();
        $testimonials = Testimonial::all();

        $banners = Banner::orderBy('position')->get();

        return view('frontend.pages.home', compact('categories', 'job_types', 'testimonials', 'banners', 'jobs'));
    }

    public function about()
    {
        return view('frontend.pages.about');
    }
}
