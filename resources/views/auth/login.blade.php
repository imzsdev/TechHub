@extends('layouts.app')

@section('content')

<section class="auth-section py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-5 col-md-7">

                <div class="auth-card">

                    <h2 class="auth-title">
                        Welcome Back
                    </h2>

                    <p class="auth-subtitle">
                        Login to your TechHub account.
                    </p>

                    <form method="POST" action="{{ route('login') }}">

                        @csrf

                        <div class="mb-4">

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

                        <div class="mb-4">

                            <label class="form-label">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Enter your password">

                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">

                            <div class="form-check">

                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="remember">

                                <label
                                    class="form-check-label text-white"
                                    for="remember">

                                    Remember Me

                                </label>

                            </div>

                            <a href="#" class="auth-link">

                                Forgot Password?

                            </a>

                        </div>
                        <button
                            type="submit"
                            class="btn-techhub w-100">

                            Login

                        </button>

                    </form>

                    <p class="text-center mt-4">

                        Don't have an account?

                        <a href="{{ route('register') }}">
                            Register
                        </a>

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection