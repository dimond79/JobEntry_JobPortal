<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\JobUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JobController extends Controller
{


    public function list()
    {
        $jobs = Job::with('company')->orderBy('created_at', 'desc')->paginate(5);
        // dd($jobs->toArray());
        // $categories = Category::with('jobs')->get();
        return view('frontend.pages.joblist', compact('jobs'));
    }

    public function create(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'responsibility' => 'required|string|max:1000',
                'qualification' => 'required|string|max:1000',
                'level' => 'required|string',
                'salary_min' => 'nullable|numeric',
                'salary_max' => 'nullable|numeric',
                'type' => 'required|string',
                'location' => 'required|string',
                'category_id' => 'required|string',
                'date_line' => 'required|date',
            ]);

            // dd($validated);
            $user = Auth::guard('jobseeker')->user();
            $validated['user_id'] = $user->id;
            $validated['slug'] = Str::slug($validated['title']);

            Job::create($validated);

            return redirect()->route('employer.dashboard')->with('success', 'Job posted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function jobDetail($slug)
    {
        $job_detail = Job::where('slug', $slug)->firstOrFail();
        $days_left = now()->diffInDays($job_detail->date_line, false);
        // dd($days_left);
        return view('frontend.pages.job_detail',  [
            'job_detail' => $job_detail,
            'days_left' => $days_left,
            'meta_title' => $job_detail->meta_title,
            'meta_description' => $job_detail->meta_description,
        ]);
    }

    public function jobsByCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $jobs = $category->jobs()->orderBy('created_at', 'desc')->paginate(10);

        return view('frontend.pages.category_list', compact('category', 'jobs'));
    }

    public function jobsBySearch(Request $request)
    {
        // dd($request->all());
        $keyword = $request->input('keyword');
        $category = $request->input('category');
        // dd($category);
        $location = $request->input('location');
        $salary = $request->input('salary');

        $jobs = Job::with('company');

        if ($keyword) {
            $jobs->where(function ($query) use ($keyword) {
                $query->where('title', 'LIKE', "%{$keyword}%")
                    ->orWhere('description', 'LIKE', "%{$keyword}%")
                    ->orWhereHas('company', function ($q) use ($keyword) {
                        $q->where('name', 'LIKE', "%{$keyword}%");
                    });
            });
        }
        if ($salary) {
            $jobs->where(
                function ($query) use ($salary) {
                    $query->where('salary_min', '<=', $salary)
                        ->Where('salary_max', '>=', $salary);
                }
            );
        }


        if ($request->filled('category')) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $jobs->where('category_id', $category->slug);
            }
        }

        if ($location) {
            $jobs->where(function ($q) use ($location) {
                $q->where('location', 'LIKE', "%{$location}%");
            });
        }


        $results = $jobs->paginate(10);





        return view('frontend.pages.search_result', [
            'jobs' => $results,
            'keyword' => $keyword,
            'category' => $category,
            'location' => $location
        ]);
    }
}
