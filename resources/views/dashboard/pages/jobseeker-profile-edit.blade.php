@extends('dashboard.layouts.app')

@section('title', 'Profile')


@section('content')

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 600px;">
            <h4 class="mb-4 text-center">Jobseeker Profile</h4>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- phone --}}
                <label for="phone">Phone</label>
                @foreach ($profile->phones as $phone)
                    <input type="text" name="phone[]" id="phone" value={{ $phone->phone_no }}
                        placeholder="Enter phone number"><br>
                @endforeach
                {{-- <input type="text" name="phone[]" id="phone" placeholder="Enter another phone number"><br> --}}
                @error('phone')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror

                {{-- gender --}}
                <label for="gender">Gender</label>
                <select name="gender" id="gender">
                    <option>Select Gender</option>
                    <option value="male" {{ $profile->gender == 'male' ? 'selected' : '' }}>Male
                    </option>
                    <option value="female" {{ $profile->gender == 'female' ? 'selected' : '' }}>
                        Female</option>
                    <option value="other" {{ $profile->gender == 'other' ? 'selected' : '' }}>Other
                    </option>
                </select><br>
                @error('gender')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror

                {{-- dob --}}
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="dob" value={{ old('dob', $profile->dob) }}><br>
                @error('dob')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror

                {{-- address --}}
                <label for="address">Address</label>
                <textarea name="address" id="address" placeholder="Enter your address">{{ old('address', $profile->address) }}</textarea><br>
                @error('address')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror

                {{-- education --}}
                <label for="education">Education</label>
                <textarea name="education" id="education" placeholder="Your education details">{{ old('education', $profile->education) }}</textarea>
                <br>
                @error('education')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror

                {{-- experience --}}
                <label for="experience">Experience</label>
                <textarea name="experience" id="experience" placeholder="Your work experience">{{ old('experience', $profile->experience) }}</textarea>
                <br>
                @error('experience')
                    <div>{{ $message }}</div>
                @enderror

                {{-- skills --}}
                <label for="skills">Skills</label>
                <textarea name="skills" id="skills" placeholder="Your skills">{{ old('skills', $profile->skills) }}</textarea>
                <br>
                @error('skills')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror

                {{-- cv (file upload) --}}
                <label for="cv">Upload CV</label>
                <input type="file" name="cv" id="cv" accept=".pdf,.doc,.docx"><br>
                @error('cv')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
                @if ($profile->cv)
                    <p>Current CV: <a href="{{ asset('storage/' . $profile->cv) }}" target="_blank">View</a></p>
                @endif

                {{-- profile_image (file upload) --}}
                <label for="profile_image">Profile Image</label>
                <input type="file" name="profile_image" id="profile_image" accept="image/*"><br>
                @error('profile_image')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror

                @if ($profile->profile_image)
                    <p>Current Image: <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="profile image"
                            width="100"></p>
                @endif

                <button type="submit">Update Profile</button>
            </form>
        </div>
    </div>

@endsection
