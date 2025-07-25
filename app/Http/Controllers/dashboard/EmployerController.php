<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
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
                $validated['logo'] = $request->file('logo')->store('companies/logo', 'public');
            } else {
                $validated['logo'] = "companies/default.png";
            }

            $validated['slug'] = Str::slug($request->name);

            Company::create($validated);

            return redirect()->route('employer.dashboard')->with('success', 'Company Registered');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
