@extends('dashboard.layouts.app')

@push('styles')
    <style>
        .status-card {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.05);
        }

        .status-card i {
            font-size: 32px;
            color: #004085;
        }

        .status-card h5 {
            margin: 10px 0 0;
            font-size: 18px;
            font-weight: 500;
        }

        .status-card .count {
            font-size: 24px;
            font-weight: bold;
            color: #004085;
        }

        .info-box {
            background-color: #d1ecf1;
            color: #0c5460;
            padding: 15px;
            text-align: left;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
@endpush

@section('title', 'Job Status')


@section('content')
    <div class="bg-light ">
        <div class="container mt-4">
            <a href="{{ route('jobseeker.dashboard') }}" class="btn btn-secondary mb-3">Back</a>
            <div class="row g-3">
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <div class="status-card">
                        <i class="fas fa-sliders-h"></i>
                        <div class="count">{{ $applied_count }}</div>
                        <h5>Jobs Applied</h5>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <div class="status-card">
                        <i class="fas fa-user"></i>
                        <div class="count">0</div>
                        <h5>Profile Visits</h5>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <div class="status-card">
                        <i class="fas fa-cloud-download-alt"></i>
                        <div class="count">0</div>
                        <h5>CV Download</h5>
                    </div>
                </div>

            </div>

            <div class="info-box mt-4">
                {{-- {{ $application_detail }} --}}
                <h3>Jobs applied</h3>
                @if (!empty($application_detail))

                    @foreach ($application_detail as $application)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $application->job->title ?? 'Job Title Not Available' }}</h5>
                                <p class="card-text">
                                    Applied on: {{ $application->created_at->format('F j, Y') }}<br>
                                    Status: <strong>{{ ucfirst($application->status ?? 'Pending') }}</strong>
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <i class="fas fa-info-circle me-1"></i> No data found for jobs applied.
                @endif
            </div>
        </div>
    </div>

@endsection
