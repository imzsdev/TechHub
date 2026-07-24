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

                    <form>

                        <div class="mb-3">

                            <label class="form-label">
                                Full Name
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                placeholder="Enter your full name">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Email Address
                            </label>

                            <input
                                type="email"
                                class="form-control"
                                placeholder="Enter your email">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Password
                            </label>

                            <input
                                type="password"
                                class="form-control"
                                placeholder="Create password">

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Confirm Password
                            </label>

                            <input
                                type="password"
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