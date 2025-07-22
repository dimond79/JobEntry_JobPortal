@extends('frontend.layouts.app')

@section('title','Job Application')

@section('content')
    <div class="row g-3 my-4">
        <div class="col-12">
            <h5 class="text-primary mb-3">Apply for this Job</h5>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-12 col-sm-6">
                <label class="form-label">Full Name *</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="col-12 col-sm-6">
                <label class="form-label">Email *</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="col-12 col-sm-6">
                <label class="form-label">Phone Number *</label>
                <input type="text" class="form-control" name="phone" required>
            </div>

            <div class="col-12 col-sm-6">
                <label class="form-label">Upload CV *</label>
                <input type="file" class="form-control" name="cv" accept=".pdf,.doc,.docx" required>
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
