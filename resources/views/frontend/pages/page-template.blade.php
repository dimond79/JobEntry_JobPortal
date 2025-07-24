@extends('frontend.layouts.app')

@section('title', 'Page')

@section('meta_description', Str::limit(strip_tags($page_content->description), 150))

@section('content')
    {{-- {{ $page_content }} --}}
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                @if (!$page_content->image)
                    <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                        <h1 class="mb-4">{{ $page_content->title }}</h1>
                        {{-- all description with class in voyager panel --}}
                        {!! $page_content->description !!}
                    </div>
                @else
                    <!-- Left Image -->
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="position-relative overflow-hidden rounded shadow">
                            <img class="img-fluid" src="{{ asset('storage/' . $page_content->image) }}"
                                alt="page left image">
                        </div>
                    </div>

                    <!-- Right Content -->
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                        <h1 class="mb-4">{{ $page_content->title }}</h1>
                        {{-- all description with class in voyager panel --}}
                        {!! $page_content->description !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Why Choose Us -->
    <div class="container-xxl py-5 bg-light">
        <div class="container text-center">
            <div class="row g-4 justify-content-center">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <img src="{{ asset('img/search.gif') }}" class="mb-3" style="width: 60px;" alt="Search Jobs">
                    <h5>Smart Job Search</h5>
                    <p>Advanced filters and keyword search help users find the best jobs in seconds.</p>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <img src="{{ asset('img/corporate-culture.gif') }}" class="mb-3" style="width: 60px;" alt="Employers">
                    <h5>Trusted Employers</h5>
                    <p>We verify and monitor employers to ensure authenticity and reliability.</p>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <img src="{{ asset('img/document.gif') }}" class="mb-3" style="width: 60px;" alt="Easy Apply">
                    <h5>Easy Apply</h5>
                    <p>Submit applications in one click with your saved profile and resume.</p>
                </div>
            </div>
        </div>
    </div>


@endsection
