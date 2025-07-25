@extends('frontend.layouts.app')

@section('title', setting('site.title'))

@section('content')

    <!-- Carousel Start -->

    <div class="container-fluid p-0">
        <div class="owl-carousel header-carousel position-relative">
            @foreach ($banners as $banner)
                <div class="owl-carousel-item position-relative">

                    <img class="img-fluid" src="{{ asset('storage/' . $banner->image) }}" alt="banner-image">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                        style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">{{ $banner->title }}</h1>
                                    {!! $banner->description !!}
                                    <a href="{{ route('job.lists') }}"
                                        class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Explore Job</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Carousel End -->


    <!-- Search Start -->
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <form action="{{ route('search.job') }}" method="GET">

                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">

                            <div class="col-md-3">
                                <input type="text" name="keyword" class="form-control border-0" placeholder="Keyword" />
                            </div>
                            <div class="col-md-3">

                                <select class="form-select border-0" name="category">
                                    <option selected disabled>Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->slug }}">{{ $category->name }} </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-3">

                                <select class="form-select border-0" name="location">
                                    <option selected disabled>Location</option>
                                    @foreach ($jobs as $job)
                                        <option value="{{ $job->location }} ">{{ $job->location }} </option>
                                    @endforeach
                                </select>

                            </div>
                            {{-- <div class="col-md-3">
                                <select class="form-select border-0" name="location">
                                    <option selected disabled>Location</option>
                                    <option value="Kathmandu">Kathmandu</option>
                                    <option value="Lalitpur">Lalitpur</option>
                                    <option value="Bhaktapur">Bhaktapur</option>
                                </select>

                            </div> --}}
                            <div class="col-md-3">
                                <input type="number" name="salary" class="form-control border-0" placeholder="Salary"
                                    min="0" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-dark border-0 w-100">Search</button>
                    </div>
            </form>
        </div>
    </div>
    </div>
    <!-- Search End -->

    {{-- {{$categories}} --}}
    <!-- Category Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
            <div class="row g-4">
                @foreach ($categories as $category)
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="{{ route('category.list', $category->slug) }}">
                            <i class="fa fa-3x fa-mail-bulk text-primary mb-4"></i>
                            <h6 class="mb-3">{{ $category->name }}</h6>
                            <p class="mb-0">{{ $category->jobs_count }} Vacancy</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Category End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="row g-0 about-bg rounded overflow-hidden">
                        <div class="col-6 text-start">
                            <img class="img-fluid w-100" src="img/about-1.jpg">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid" src="img/about-2.jpg" style="width: 85%; margin-top: 15%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid" src="img/about-3.jpg" style="width: 85%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid w-100" src="img/about-4.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">We Help To Get The Best Job And Find A Talent</h1>
                    <p class="mb-4">Browse thousands of opportunities and connect with top employers. Whether you're just
                        starting or looking to level up, we help you find the job that fits your passion and skills.</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Verified listings from trusted companies</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Advanced filters to match your career goals</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Personalized job alerts and recommendations</p>
                    <a class="btn btn-primary py-3 px-5 mt-3" href="{{ route('page.template', 'about-jobentry') }}">Read
                        More</a>

                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Jobs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" id="job" data-wow-delay="0.1s">Job Listing</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                    @foreach ($job_types as $key => $job_type)
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 {{ $key == 0 ? 'active' : '' }}"
                                data-bs-toggle="pill" href="#{{ Str::slug($job_type->type) }}">
                                <h6 class="mt-n1 mb-0">{{ $job_type->type }}</h6>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach ($job_types as $key => $job_typ)
                        @php
                            $jobs = \App\Models\Job::with('company')->where('type', $job_typ->type)->paginate(5);
                            // dd($jobs->toArray());
                        @endphp
                        <div id="{{ Str::slug($job_typ->type) }}"
                            class="tab-pane fade show p-0 {{ $key == 0 ? 'active' : '' }}">
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
                                                        class="far fa-clock text-primary me-2"></i>{{ $job->type }}
                                                </span>
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
                                                <a class="btn btn-primary"
                                                    href="{{ route('job.apply', $job->slug) }}">Apply Now</a>
                                            </div>
                                            <small>Posted {{ $job->created_at->diffForHumans() }}</small>
                                            <small class="text-truncate"><i
                                                    class="far fa-calendar-alt text-primary me-2"></i>Deadline:
                                                {{ $job->date_line->format('d M Y') }} </small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            {{ $jobs->links('pagination::bootstrap-5') }}

                        </div>
                    @endforeach
                </div>
                <a class="btn btn-primary py-3 px-5" href="{{ route('job.lists') }}">Browse More Jobs</a>
            </div>
        </div>
        <!-- Jobs End -->


        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                {{-- {{ $testimonials }} --}}
                <h1 class="text-center mb-5">What Our Users Say</h1>
                <div class="owl-carousel testimonial-carousel">
                    @foreach ($testimonials as $testimonial)
                        <div class="testimonial-item bg-light rounded p-4">
                            <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                            <p>{{ $testimonial->message }}</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded"
                                    src="{{ asset('storage/' . $testimonial->image) }}"
                                    style="width: 50px; height: 50px;">
                                <div class="ps-3">
                                    <h5 class="mb-1">{{ $testimonial->name }}</h5>
                                    <small>{{ $testimonial->designation }}, {{ $testimonial->company_name }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>We’ve hired multiple candidates through this portal — it's simple, efficient, and filled with
                            quality talent.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.jpg"
                                style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Sujan Shrestha</h5>
                                <small>HR ManageHR Manager, TechHive</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Great interface and job recommendations! I received personalized alerts and got hired within a
                            month.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.jpg"
                                style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Ritika Joshi</h5>
                                <small>UI/UX Designer</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>As a recruiter, this has been the easiest way to connect with passionate professionals ready to
                            grow with us.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-4.jpg"
                                style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Pramesh Karki</h5>
                                <small>Co-founder, StartUpWave</small>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

        <!-- Testimonial End -->


    @endsection
