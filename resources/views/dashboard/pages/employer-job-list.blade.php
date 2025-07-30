@extends('dashboard.layouts.employer_app')

@section('title', 'My Jobs')

@push('styles')
    <style>
        .btn-outline-red {
            color: #dc3545;
            /* Bootstrap’s red */
            border-color: #dc3545;
        }

        .btn-outline-red:hover,
        .btn-outline-red:focus {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }
    </style>
@endpush

@section('content')
    <div class="container py-4">
        <a href="{{ route('employer.dashboard') }}" class="btn btn-dark mb-3">Back</a>
        <h2 class="mb-4">My Job Listings</h2>

        @if ($jobs->isEmpty())
            <div class="alert alert-secondary">
                You haven't posted any jobs yet.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Title</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Posted At</th>
                            <th>Deadline</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $job)
                            <tr>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->location }}</td>
                                <td>
                                    @if ($job->date_line < now())
                                        <span class="badge bg-secondary">Inactive</span>
                                    @else
                                        <span class="badge bg-success">Active</span>
                                    @endif
                                    {{-- @if ($job->status === 'active')
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif --}}
                                </td>
                                <td>{{ $job->created_at->format('d M Y') }}</td>
                                <td>{{ $job->date_line->format('d M Y') }}</td>
                                <td>
                                    {{-- <a href="" class="btn btn-outline-info btn-sm">View</a>
                                    <a href="" class="btn btn-outline-warning btn-sm">Edit</a>
                                    <a href="" class="btn btn-outline-red btn-sm">Delete</a> --}}
                                    <a href="{{ route('employer.view.applications', $job->slug) }}"
                                        class="btn btn-primary">View
                                        Applications</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
