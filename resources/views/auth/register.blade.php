@extends('layouts.app')

@section('content')

<section class="auth-section py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-6 col-md-8">

                <div class="auth-card">

                    <h2 class="auth-title">
                        Create Account
                    </h2>

                    <p class="auth-subtitle">
                        Join TechHub today.
                    </p>

                    <form method="POST" action="{{ route('register') }}">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Full Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter your full name"
                                value="{{ old('name') }}">

                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Email Address
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Enter your email"
                                value="{{ old('email') }}">

                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Create password">

                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Confirm Password
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                placeholder="Confirm password">

                        </div>

                        <button
                            type="submit"
                            class="btn-techhub w-100">

                            Create Account

                        </button>

                    </form>

                    <p class="text-center mt-4 text-white">

                        Already have an account?

                        <a href="{{ route('login') }}">
                            Login
                        </a>

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection