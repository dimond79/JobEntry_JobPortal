@extends('dashboard.layouts.employer_app')

@section('title', 'Job Applications')

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
        <h2 class="mb-4">Job Applicants</h2>

        @if ($job_applications->isEmpty())
            <div class="alert alert-secondary">No applications found.</div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Applicant Name</th>
                            <th>Email</th>
                            <th>Applied On</th>
                            <th>Status</th>
                            <th>Resume</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($job_applications as $job)
                            @foreach ($job->applications as $app)
                                <tr>

                                    <td>{{ $app->jobuser->name ?? 'N/A' }}</td>
                                    <td>{{ $app->jobuser->email ?? 'N/A' }}</td>
                                    <td>{{ $app->created_at->format('d M Y') }}</td>
                                    <td>
                                        {{-- @if ($app->status === 'pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @elseif($app->status === 'accepted')
                                            <span class="badge bg-success">Accepted</span>
                                        @else
                                            <span class="badge bg-danger">Rejected</span>
                                        @endif --}}

                                        <form action="{{ route('update.jobseeker.status', $app->id) }}" method="POST">
                                            @csrf
                                            <select name="status" class="form-select w-auto status-select"
                                                data-current="{{ $app->status }}">
                                                <option value="pending" {{ $app->status == 'pending' ? 'selected' : '' }}>
                                                    <span class="badge bg-warning text-dark">Pending</span>
                                                </option>
                                                <option value="interviewed"
                                                    {{ $app->status == 'interviewed' ? 'selected' : '' }}><span
                                                        class="badge bg-warning text-dark">Interviewed</span></option>
                                                <option value="rejected" {{ $app->status == 'rejected' ? 'selected' : '' }}>
                                                    <span class="badge bg-warning text-dark">Rejected</span>
                                                </option>
                                                <option value="offered" {{ $app->status == 'offered' ? 'selected' : '' }}>
                                                    <span class="badge bg-warning text-dark">Offered</span>
                                                </option>
                                            </select>
                                            <button type="submit"
                                                class="btn btn-sm btn-success update-btn d-none mt-2">Update</button>
                                        </form>
                                    </td>
                                    <td>
                                        @if ($app->cv_path)
                                            {{-- <a href="{{ asset('storage/' . $app->cv_path) }}" --}}
                                            <a href="{{ route('employer.cv.download', $app->id) }}"
                                                class="btn btn-sm btn-outline-primary" target="_blank">Download</a>
                                        @else
                                            <span class="text-muted">No Resume</span>
                                        @endif
                                    </td>
                                    <td>

                                        @if ($app->message)
                                            <p>{{ $app->message }}</p>
                                        @else
                                            <p>No Message</p>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
@push('scripts')
    <script>
        document.querySelectorAll('.status-select').forEach(function(select) {
            const currentValue = select.dataset.current;
            const button = select.closest('form').querySelector('.update-btn');

            select.addEventListener('change', function() {
                if (select.value !== currentValue) {
                    button.classList.remove('d-none');
                } else {
                    button.classList.add('d-none');
                }
            });
        });
    </script>
@endpush
