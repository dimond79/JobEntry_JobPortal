  @extends('frontend.layouts.app')

  @section('content')
      <div class="row g-3 mb-4">
          <div class="col-12">
              <h5 class="text-primary mb-3">Job Details</h5>
          </div>
          <div class="col-12 col-sm-6">
              <label class="form-label">Job Title *</label>
              <input type="text" class="form-control" name="job_title" required>
          </div>
          <div class="col-12 col-sm-6">
              <label class="form-label">Company Name *</label>
              <input type="text" class="form-control" name="job_title" required>
          </div>
          <div class="col-12 col-sm-6">
              <label class="form-label">Job Category *</label>
              <select class="form-select" name="category_id" required>
                  <option value="">Select Category</option>
                  <option value="1">Technology</option>
                  <option value="2">Marketing</option>
                  <option value="3">Finance</option>
                  <option value="4">Healthcare</option>
                  <option value="5">Education</option>
                  <option value="6">Sales</option>
                  <option value="7">Human Resources</option>
                  <option value="8">Operations</option>
              </select>
          </div>
          <div class="col-12 col-sm-6">
              <label class="form-label">Job Type *</label>
              <select class="form-select" name="job_type" required>
                  <option value="">Select Job Type</option>
                  <option value="Full Time">Full Time</option>
                  <option value="Part Time">Part Time</option>
                  <option value="Contract">Contract</option>
                  <option value="Freelance">Freelance</option>
                  <option value="Internship">Internship</option>
                  <option value="Remote">Remote</option>
              </select>
          </div>
          <div class="col-12 col-sm-6">
              <label class="form-label">Experience Level</label>
              <select class="form-select" name="experience_level">
                  <option value="">Select Experience Level</option>
                  <option value="Entry Level">Entry Level</option>
                  <option value="Mid Level">Mid Level</option>
                  <option value="Senior Level">Senior Level</option>
                  <option value="Executive">Executive</option>
              </select>
          </div>
          <div class="col-12 col-sm-6">
              <label class="form-label">Location *</label>
              <input type="text" class="form-control" name="location" required placeholder="City, Country">
          </div>

          <div class="col-12">
            <label for="description">Description *</label>
          </div>


      <div class="col-12">
          <button class="btn btn-primary w-100 py-3" type="submit">
              <i class="fa fa-paper-plane me-2"></i>Post Job Listing
          </button>
      </div>
  @endsection
