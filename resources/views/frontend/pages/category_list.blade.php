@extends('frontend.layouts.app')

@section('title', 'Job List')

@section('content')

    <div class="container-xxl py-5">
        <div class="container">
            {{-- {{$jobs}} --}}
            <h3>Category: {{ $category->name }}</h3>
            <div class="tab-class text-center wow fadeInUp my=3" data-wow-delay="0.3s">
                @if ($jobs->isempty())
                    <h5>No job found</h5>
                @endif
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        @foreach ($jobs as $job)
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
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
                                        <small class="text-truncate"><i
                                                class="far fa-calendar-alt text-primary me-2"></i>Date
                                            Line:{{ $job->date_line }} </small>
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
