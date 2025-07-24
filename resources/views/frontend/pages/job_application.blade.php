@extends('frontend.layouts.app')

@section('title', 'Job Application')

@section('content')
    <div class="row g-3 my-4">
        <div class="col-12">
            <h5 class="text-primary mb-3">Apply for this Job</h5>
        </div>
        <form action="{{ route('jobdetails.apply', $slug) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-12 col-sm-6">
                <label class="form-label">Full Name *</label>
                <input type="text" class="form-control" name="name" value="{{ $job_user->name }}" required>
            </div>

            <div class="col-12 col-sm-6">
                <label class="form-label">Email *</label>
                <input type="email" class="form-control" name="email" value="{{ $job_user->email }}" required>
            </div>

            <div class="col-12 col-sm-6">
                <label class="form-label">Phone Number *</label>
                @foreach ($jobseeker_details->phones as $phone)
                    <input type="text" class="form-control" name="phone_no" value="{{ $phone->phone_no }}" required>
                @endforeach
            </div>

            <div class="col-12 col-sm-6">
                <label class="form-label">CV *</label>

                {{-- @if ($jobseeker_details->cv)
                    <p>Current CV: <a href="{{ asset('storage/' . $jobseeker_details->cv) }}">View CV </a></p>
                    @else
                    <label class="form-label">Upload CV *</label>
                    <input type="file" class="form-control" name="cv_file" accept=".pdf">
                    @endif --}}
                <label class="form-label">Upload CV *</label>
                @if ($jobseeker_details->cv)
                    <p>Current CV: <a href="{{ asset('storage/' . $jobseeker_details->cv) }}">View CV </a></p>
                @endif
                <input type="file" class="form-control" name="cv_path" accept=".pdf">
            </div>

            <div class="col-12">
                <label class="form-label">Message</label>
                <textarea class="form-control" name="message" rows="4" placeholder="Your message..."></textarea>
            </div>

            <div class="col-12">
                <button class="btn btn-primary w-100 py-3 mt-3" type="submit">
                    <i class="fa fa-paper-plane me-2"></i>Submit Application
                </button>
            </div>
        </form>
    </div>
@endsection
