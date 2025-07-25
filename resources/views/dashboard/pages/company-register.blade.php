@extends('dashboard.layouts.employer_app')

@section('title', 'Profile')


@section('content')

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 600px;">
            <h4 class="mb-4 text-center">Company Profile</h4>

            <form action="{{ route('company.profile.register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- phone --}}
                <label class="form-label">Company Name</label><br>
                <input class="form-content" type="text" name="name" placeholder="Enter company name"><br>
                @error('name')
                    <div>{{ $message }}</div>
                @enderror
                <label class="form-label">Company email</label><br>
                <input class="form-content" type="email" name="email" placeholder="Enter company email"><br>
                @error('email')
                    <div>{{ $message }}</div>
                @enderror
                <label class="form-label">Phone number</label><br>
                <input class="form-content" type="text" name="number" placeholder="Enter phone number"><br>
                @error('number')
                    <div>{{ $message }}</div>
                @enderror
                <label class="form-label">Location</label><br>
                <input class="form-content" type="text" name="location" placeholder="Enter phone number"><br>
                @error('location')
                    <div>{{ $message }}</div>
                @enderror


                {{-- education --}}
                <label class="form-label">Company Description</label><br>
                <textarea class="form-content" name="description" placeholder="Your education details"></textarea>
                <br>
                @error('description')
                    <div>{{ $message }}</div>
                @enderror



                {{-- profile_image (file upload) --}}
                <label class="form-label">Company Logo</label><br>
                <input class="form-content" type="file" name="logo" accept="image/*"><br>
                @error('profile_image')
                    <div>{{ $message }}</div>
                @enderror

                <button type="submit">Save Company Profile</button>
            </form>
        </div>
    </div>

@endsection
