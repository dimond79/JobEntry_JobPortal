@extends('frontend.layouts.app')

@section('title', 'Job Search')

@section('content')


    <h3>Showing search results </h3>

    @if ($jobs->count())
        @foreach ($jobs as $job)
            <div class="job-item p-4 mb-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                        <img class="flex-shrink-0 img-fluid border rounded"
                            src="{{ asset('storage/' . ($job->company?->logo ?? 'employer/default.png')) }}" alt=""
                            style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <a href="{{ route('job.detail', $job->slug) }}">
                                <h5 class="mb-3">{{ $job->title }}</h5>
                            </a>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>
                                {{ $job->location }}</span>
                            <span class="text-truncate me-3"><i
                                    class="far fa-clock text-primary me-2"></i>{{ $job->type }} </span>
                            <span class="text-truncate me-0"><i
                                    class="far fa-money-bill-alt text-primary me-2"></i>${{ $job->salary_min }} -
                                ${{ $job->salary_max }}</span>
                        </div>
                    </div>
                    <div
                        class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                        <div class="d-flex mb-3">
                            {{-- <a class="btn btn-light btn-square me-3" href=""><i
                                            class="far fa-heart text-primary"></i></a> --}}
                            <a class="btn btn-primary" href="{{ route('job.apply', $job->slug) }}">Apply Now</a>
                        </div>
                        <small class="text-truncate"><i
                                class="far fa-calendar-alt text-primary me-2"></i>Deadline:{{ $job->date_line->format('d M Y') }}
                        </small>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $jobs->links() }}
    @else
        <p>NO jobs found.</p>
    @endif

@endsection
