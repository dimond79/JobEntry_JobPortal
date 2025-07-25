@extends('dashboard.layouts.app')

@section('title', 'Jobseeker Dasboard')

@section('content')

    <div class="bg-light">

        <!-- Navbar -->


        <!-- Dashboard Container -->
        <div class="container mt-5">
            <div class="text-center mb-4">
                <h2>Welcome, Jobseeker!</h2>
                <p class="text-muted">Here’s your dashboard on Job Entry.</p>
            </div>

            <div class="row g-4">

                <!-- Profile Section -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">My Profile</h5>
                            <p class="card-text">View or edit your personal information.</p>
                            <a href="{{ route('jobseeker.profile') }}" class="btn btn-sm btn-primary">Go to Profile</a>
                        </div>
                    </div>
                </div>

                <!-- Browse Jobs -->
                {{-- <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Browse Jobs</h5>
                            <p class="card-text">Search and apply for jobs that suit you.</p>
                            <a href="{{ route('job.lists') }}" class="btn btn-sm btn-primary">Browse Jobs</a>
                        </div>
                    </div>
                </div> --}}

                <!-- Applied Jobs -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">My Applications</h5>
                            <p class="card-text">Track jobs you have applied to.</p>
                            <a href="{{ route('jobseeker.status') }}" class="btn btn-sm btn-primary">View Applications</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
