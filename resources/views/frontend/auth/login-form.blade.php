@extends('frontend.layouts.app')

@section('title', 'Login')


@section('content')
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Welcome to Job Entry</h2>
        <div class="row">
            <div class="col-md-6 mx-auto"> <!-- Centered and medium width -->
                <form action="{{ route('login') }}" method="POST" class="border p-4 shadow rounded bg-white">
                    @csrf
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100">Login</button>

                    <!-- Login Link -->
                    <p class="text-center mt-3">
                        New to JobEntry? <a href="">Register here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>


@endsection
