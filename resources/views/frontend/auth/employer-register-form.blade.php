@extends('frontend.layouts.app')

@section('title', 'Register')


@section('content')
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Register - Job Entry</h2>
        <div class="row">
            <div class="col-md-6 mx-auto"> <!-- Centered and medium width -->
                <form action="{{ route('register.employer') }}" method="POST" class="border p-4 shadow rounded bg-white">
                    @csrf
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Company's Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100">Register</button>

                    <!-- Login Link -->
                    <p class="text-center mt-3">
                        Already have an account? <a href="{{ route('login.form') }}">Login here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>


@endsection
