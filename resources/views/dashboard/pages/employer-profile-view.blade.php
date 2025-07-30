@extends('dashboard.layouts.employer_app')

@section('title', 'Job Applications')


@section('content')
    <div class="container ">
        <a href="{{ url()->previous() }}" class="btn btn-secondary my-3">Back</a>
        <h3 class="mb-4">Applicant Profile</h3>

        <div class="card shadow-sm p-4">
            @if ($profile->profile_image)
                <div class="text-center mb-3">
                    <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="Profile Image" class="rounded-circle"
                        width="150" height="150">
                </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td>{{ $job_user->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $job_user->email ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{ $profile->gender ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>{{ $profile->dob ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $profile->address ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Phone(s):</th>
                    <td>
                        @forelse ($profile->phones as $phone)
                            {{ $phone->phone_no }}<br>
                        @empty
                            -
                        @endforelse
                    </td>
                </tr>
                <tr>
                    <th>Education</th>
                    <td>{{ $profile->education ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Experience</th>
                    <td>{{ $profile->experience ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Skills</th>
                    <td>{{ $profile->skills ?? '-' }}</td>
                </tr>
            </table>
        </div>
    </div>


@endsection
