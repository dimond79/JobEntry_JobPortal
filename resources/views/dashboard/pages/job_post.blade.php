  @extends('dashboard.layouts.employer_app')

  @section('content')
      <div class="container">
          <a href="{{ url()->previous() }}" class="btn btn-dark my-3">Back</a>
          <form action="{{ route('job.create') }}" method="POST">
              @csrf
              <div class="row g-3 mb-6">
                  <div class="col-12">
                      <h5 class="text-dark mb-3">Job Details</h5>

                  </div>
                  <div class="col-12 col-sm-6">
                      <label class="form-label">Job Title</label>
                      <input type="text" class="form-control" name="title" required>
                  </div>
                  <div class="col-12 col-sm-6">
                      <label class="form-label">Level</label>
                      {{-- <input type="text" class="form-control" name="job_title" required> --}}
                      <select class="form-select" name="level" required>
                          <option value="" selected disabled>Select Job Level</option>
                          <option value="Intern">Intern</option>
                          <option value="Junior">Junior</option>
                          <option value="Mid Level">Mid Level</option>
                          <option value="Senior">Senior</option>
                      </select>
                  </div>

                  <div class="col-12 col-sm-6">
                      <label class="form-label">Job Category</label>
                      <select class="form-select" name="category_id" required>
                          <option value="" selected disabled>Select Category</option>
                          @foreach ($job_categories as $category)
                              <option value="{{ $category->slug }}">{{ $category->name }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="col-12 col-sm-6">
                      <label class="form-label">Job Type</label>
                      <select class="form-select" name="type" required>
                          <option value="">Select Job Type</option>
                          <option value="Full Time">Full Time</option>
                          <option value="Part Time">Part Time</option>
                          <option value="Internship">Internship</option>
                          <option value="Remote">Remote</option>
                      </select>
                  </div>
                  <div class="col-12 col-sm-6">
                      <label class="form-label">Description</label><br>
                      <textarea class="form-control" name="description" placeholder="Enter job description" rows="3"></textarea>
                  </div>
                  <div class="col-12 col-sm-6">
                      <label class="form-label">Responsibility</label><br>
                      <textarea class="form-control" name="responsibility" placeholder="Enter job responsibility" rows="3"></textarea>
                  </div>
                  <div class="col-12 col-sm-6">
                      <label class="form-label">Qualification</label><br>
                      <textarea class="form-control" name="qualification" placeholder="Enter job qualification" rows="3"></textarea>
                  </div>

                  <div class="col-12 col-sm-6">
                      <label class="form-label">Location</label>
                      <select class="form-select" name="location" required>
                          <option value="">Select Job Type</option>
                          <option value="Kathmandu">Kathmandu</option>
                          <option value="Lalitpur">Lalitpur</option>
                          <option value="Bhaktapur">Bhaktapur</option>
                          <option value="Biratnagar">Biratnagar</option>
                      </select>
                  </div>

                  <div class="col-12 col-sm-6">
                      <label class="form-label">Salary</label>
                      <div class="form-control">
                          <input type="number" name="salary_min" placeholder="Salary min" />
                          <input type="number" name="salary_max" placeholder="Salary max" />
                      </div>

                  </div>
                  <div class="col-12 col-sm-6">
                      <label class="form-label">Deadline</label>
                      <input class="form-control" type="date" name="date_line">
                  </div>




                  <div class="col-12">
                      <button class="btn btn-dark w-100 py-3" type="submit">
                          <i class="fa fa-paper-plane me-2"></i>Post Job Listing
                      </button>
                  </div>
              </div>
          </form>
      @endsection
