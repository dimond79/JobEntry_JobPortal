@extends('frontend.layouts.app')

@section('title', 'Job List')



@section('content')
    {{-- {{ $jobs }} --}}

    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" id="job" data-wow-delay="0.1s">Job Listing</h1>

            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                {{-- <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill"
                        href="#tab-1">
                        <h6 class="mt-n1 mb-0">Featured</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                        <h6 class="mt-n1 mb-0">Full Time</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill"
                        href="#tab-3">
                        <h6 class="mt-n1 mb-0">Part Time</h6>
                    </a>
                </li>
            </ul> --}}
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        @foreach ($jobs as $job)
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        {{-- {{ dd($job->company?->logo) }} --}}
                                        <img class="flex-shrink-0 img-fluid border rounded"
                                            src="{{ asset('storage/' . ($job->company?->logo ?? 'companies/default.png')) }}"
                                            alt="company logo" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <a href="{{ route('job.detail', $job->slug) }}">
                                                <h5 class="mb-3">{{ $job->title }}</h5>
                                            </a>
                                            <span class="text-truncate me-3"><i
                                                    class="fa fa-map-marker-alt text-primary me-2"></i>
                                                {{ $job->location }}</span>
                                            <span class="text-truncate me-3"><i
                                                    class="far fa-clock text-primary me-2"></i>{{ $job->type }} </span>
                                            <span class="text-truncate me-0"><i
                                                    class="far fa-money-bill-alt text-primary me-2"></i>${{ $job->salary_min }}
                                                - ${{ $job->salary_max }}</span>
                                        </div>
                                    </div>
                                    <div
                                        class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            {{-- <a class="btn btn-light btn-square me-3" href=""><i
                                            class="far fa-heart text-primary"></i></a> --}}
                                            <a class="btn btn-primary" href="{{ route('job.apply', $job->slug) }}">Apply
                                                Now</a>
                                        </div>
                                        <small>Posted: {{ $job->created_at->diffForHumans() }}</small>
                                        <small class="text-truncate"><i
                                                class="far fa-calendar-alt text-primary me-2"></i>Date
                                            Line:{{ $job->date_line->format('d M Y') }} </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{ $jobs->links('pagination::bootstrap-5') }}

                    </div>
                </div>
            </div>
        </div>

    @endsection
