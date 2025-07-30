@extends('frontend.layouts.app')

@section('title', 'Job Detail')

@section('meta_description', Str::limit(strip_tags($job_detail->description), 150))

@section('content')
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-5">
                        <img class="flex-shrink-0 img-fluid border rounded"
                            src="{{ asset('storage/' . ($job_detail->company?->logo ?? 'employer/default.png')) }}"
                            alt="company logo" style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h3 class="mb-3">{{ $job_detail->title }}</h3>
                            <span class="text-truncate me-3"><i
                                    class="fa fa-map-marker-alt text-primary me-2"></i>{{ $job_detail->location }}
                            </span>
                            <span class="text-truncate me-3"><i
                                    class="far fa-clock text-primary me-2"></i>{{ $job_detail->type }}</span>
                            <span class="text-truncate me-0"><i
                                    class="far fa-money-bill-alt text-primary me-2"></i>${{ $job_detail->salary_min }} -
                                ${{ $job_detail->salary_max }}</span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="mb-3">Job description</h4>
                        <p>{!! $job_detail->description !!}</p>
                        <h4 class="mb-3">Responsibility</h4>
                        <p>Following are the job responsibility:</p>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-angle-right text-primary me-2"></i>{{ $job_detail->responsibility }}</li>
                            <br /><br />
                            <h4 class="mb-3">Qualifications</h4>
                            <p>Qualifications for the job are:</p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-angle-right text-primary me-2"></i>{{ $job_detail->qualification }}</li>
                            </ul>
                    </div>

                    <a href="{{ route('job.apply', $job_detail->slug) }}" class="btn btn-primary ">Apply</a>

                    {{-- <div class="">
                        <h4 class="mb-4">Apply For The Job</h4>
                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" placeholder="Your Name">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control" placeholder="Your Email">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" placeholder="Portfolio Website">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="file" class="form-control bg-white">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="5" placeholder="Coverletter"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Apply Now</button>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Job Summery</h4>
                        {{-- <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: 01 Jan, 2045</p> --}}
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Published On:
                            {{ $job_detail->created_at->format('d M, Y') }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>
                            @if ($days_left > 0)
                                <small>Days left: {{ $days_left }}</small>
                            @else
                                <small>Expired.</small>
                            @endif
                        </p>
                        {{-- <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: 123 Position</p> --}}
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Job Type: {{ $job_detail->type }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: ${{ $job_detail->salary_min }} -
                            ${{ $job_detail->salary_max }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Location:
                            {{ $job_detail->location }}</p>
                        <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Date Line:
                            {{ $job_detail->date_line->format('d M Y') }}</p>
                    </div>
                    <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Company Detail</h4>
                        <h5 class="mb-3">{{ $job_detail->company->name }}</h5>
                        <p class="m-0">{{ $job_detail->company->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
