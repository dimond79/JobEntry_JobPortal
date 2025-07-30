@extends('dashboard.layouts.employer_app')


@section('content')
    <!-- Dashboard Content -->
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h2>Welcome, {{ Auth::guard('jobseeker')->user()->name }}!</h2>
            <p class="text-muted">Manage your job postings and applicants on Job Entry.</p>
        </div>

        <div class="row g-4">
            <div class="row justify-content-center mt-3">
                <!-- Post New Job -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Post a Job</h5>
                            <p class="card-text">Create and publish a new job vacancy.</p>
                            <a href="{{ route('job.form') }}" class="btn btn-sm btn-dark">Post Job</a>
                        </div>
                    </div>
                </div>

                <!-- Manage Jobs -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Manage Jobs</h5>
                            <p class="card-text">Edit, delete, or review your job listings.</p>
                            <a href="{{ route('employer.job.list') }}" class="btn btn-sm btn-dark">View Jobs</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Applications -->
            {{-- <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">View Applications</h5>
                        <p class="card-text">Review candidates who applied for your jobs.</p>
                        <a href="{{ route('employer.app.job.list') }}" class="btn btn-sm btn-dark">View Applications</a>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
@endsection
