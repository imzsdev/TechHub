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

                    <form>

                        <div class="mb-4">

                            <label class="form-label">
                                Email Address
                            </label>

                            <input
                                type="email"
                                class="form-control"
                                placeholder="Enter your email">

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Password
                            </label>

                            <input
                                type="password"
                                class="form-control"
                                placeholder="Enter your password">

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