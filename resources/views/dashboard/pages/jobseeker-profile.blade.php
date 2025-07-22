@extends('dashboard.layouts.app')

@section('title', 'Profile')


@section('content')

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 600px;">
            <h4 class="mb-4 text-center">Jobseeker Profile</h4>

            <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- phone --}}
                <label for="phone">Phone</label>
                <input type="text" name="phone[]" id="phone" placeholder="Enter phone number"><br>
                <input type="text" name="phone[]" id="phone" placeholder="Enter another phone number"><br>
                @error('phone')
                    <div>{{ $message }}</div>
                @enderror

                {{-- gender --}}
                <label for="gender">Gender</label>
                <select name="gender" id="gender">
                    <option>Select Gender</option>
                    <option value="male">Male
                    </option>
                    <option value="female">
                        Female</option>
                    <option value="other">Other
                    </option>
                </select><br>
                @error('gender')
                    <div>{{ $message }}</div>
                @enderror

                {{-- dob --}}
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="dob"><br>
                @error('dob')
                    <div>{{ $message }}</div>
                @enderror

                {{-- address --}}
                <label for="address">Address</label>
                <textarea name="address" id="address" placeholder="Enter your address"></textarea><br>
                @error('address')
                    <div>{{ $message }}</div>
                @enderror

                {{-- education --}}
                <label for="education">Education</label>
                <textarea name="education" id="education" placeholder="Your education details"></textarea>
                <br>
                @error('education')
                    <div>{{ $message }}</div>
                @enderror

                {{-- experience --}}
                <label for="experience">Experience</label>
                <textarea name="experience" id="experience" placeholder="Your work experience"></textarea>
                <br>
                @error('experience')
                    <div>{{ $message }}</div>
                @enderror

                {{-- skills --}}
                <label for="skills">Skills</label>
                <textarea name="skills" id="skills" placeholder="Your skills"></textarea>
                <br>
                @error('skills')
                    <div>{{ $message }}</div>
                @enderror

                {{-- cv (file upload) --}}
                <label for="cv">Upload CV</label>
                <input type="file" name="cv" id="cv" accept=".pdf,.doc,.docx"><br>
                @error('cv')
                    <div>{{ $message }}</div>
                @enderror
                {{-- @if ($profile->cv)
                    <p>Current CV: <a href="{{ asset('storage/' . $profile->cv) }}" target="_blank">View</a></p>
                @endif --}}

                {{-- profile_image (file upload) --}}
                <label for="profile_image">Profile Image</label>
                <input type="file" name="profile_image" id="profile_image" accept="image/*"><br>
                @error('profile_image')
                    <div>{{ $message }}</div>
                @enderror
                {{-- @if ($profile->profile_image)
                    <p>Current Image: <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="Profile Image"
                            width="100"></p>
                @endif --}}

                <button type="submit">Save Profile</button>
            </form>
        </div>
    </div>

@endsection
