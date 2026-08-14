@extends('layouts.app')

@section('content')

<section class="checkout-section py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h1 class="section-title">
                Checkout
            </h1>

            <p class="section-subtitle">
                Complete your order securely.
            </p>

        </div>

        <!-- ========================================= -->
        <!-- CHECKOUT FORM -->
        <!-- ========================================= -->

        <form
            action="{{ route('checkout.place') }}"
            method="POST">

            @csrf

            <div class="row g-4">

                <!-- ================================= -->
                <!-- Customer Information -->
                <!-- ================================= -->

                <div class="col-lg-7">

                    <div class="checkout-card">

                        <h3 class="checkout-title">
                            Shipping Information
                        </h3>

                        <div class="row g-3">

                            <!-- Full Name -->

                            <div class="col-md-6">

                                <label class="form-label">
                                    Full Name
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control checkout-input"
                                    placeholder="Enter your full name"
                                    value="{{ old('name', auth()->user()->name ?? '') }}"
                                    required>

                            </div>


                            <!-- Phone -->

                            <div class="col-md-6">

                                <label class="form-label">
                                    Phone Number
                                </label>

                                <input
                                    type="tel"
                                    name="phone"
                                    class="form-control checkout-input"
                                    placeholder="01XXXXXXXXX"
                                    value="{{ old('phone') }}"
                                    required>

                            </div>


                            <!-- Email -->

                            <div class="col-12">

                                <label class="form-label">
                                    Email Address
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control checkout-input"
                                    placeholder="Enter your email"
                                    value="{{ old('email', auth()->user()->email ?? '') }}"
                                    required>

                            </div>


                            <!-- Address -->

                            <div class="col-12">

                                <label class="form-label">
                                    Delivery Address
                                </label>

                                <textarea
                                    name="address"
                                    class="form-control checkout-input"
                                    rows="4"
                                    placeholder="Enter your complete delivery address"
                                    required>{{ old('address') }}</textarea>

                            </div>


                            <!-- City -->

                            <div class="col-md-6">

                                <label class="form-label">
                                    City
                                </label>

                                <input
                                    type="text"
                                    name="city"
                                    class="form-control checkout-input"
                                    placeholder="Dhaka"
                                    value="{{ old('city') }}"
                                    required>

                            </div>


                            <!-- Postal Code -->

                            <div class="col-md-6">

                                <label class="form-label">
                                    Postal Code
                                </label>

                                <input
                                    type="text"
                                    name="postal_code"
                                    class="form-control checkout-input"
                                    placeholder="1200"
                                    value="{{ old('postal_code') }}"
                                    required>

                            </div>


                            <!-- Payment Method -->

                            <div class="col-12">

                                <label class="form-label">
                                    Payment Method
                                </label>

                                <select
                                    name="payment_method"
                                    class="form-select checkout-input"
                                    required>

                                    <option value="">
                                        Select Payment Method
                                    </option>

                                    <option
                                        value="cod"
                                        {{ old('payment_method') === 'cod' ? 'selected' : '' }}>

                                        Cash on Delivery

                                    </option>

                                    <option
                                        value="sslcommerz"
                                        {{ old('payment_method') === 'sslcommerz' ? 'selected' : '' }}>

                                        SSLCommerz

                                    </option>

                                </select>

                            </div>


                            <!-- Order Notes -->

                            <div class="col-12">

                                <label class="form-label">
                                    Order Notes
                                </label>

                                <textarea
                                    name="notes"
                                    class="form-control checkout-input"
                                    rows="3"
                                    placeholder="Optional notes about your order">{{ old('notes') }}</textarea>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- ================================= -->
                <!-- Order Summary -->
                <!-- ================================= -->

                <div class="col-lg-5">

                    <div class="checkout-card">

                        <h3 class="checkout-title">
                            Order Summary
                        </h3>


                        @php

                            $subtotal = 0;

                            foreach ($cart as $item) {

                                $subtotal +=
                                    $item['price'] * $item['quantity'];

                            }

                            $shipping = 0;

                            $total = $subtotal + $shipping;

                        @endphp


                        <!-- Cart Products -->

                        <div class="checkout-products">

                            @foreach($cart as $item)

                                <div class="checkout-product">

                                    <div class="checkout-product-info">

                                        <strong>
                                            {{ $item['name'] }}
                                        </strong>

                                        <span>
                                            Qty: {{ $item['quantity'] }}
                                        </span>

                                    </div>

                                    <strong>
                                        ৳ {{ number_format(
                                            $item['price'] * $item['quantity'],
                                            2
                                        ) }}
                                    </strong>

                                </div>

                            @endforeach

                        </div>


                        <!-- Price Summary -->

                        <div class="checkout-summary">

                            <div class="summary-row">

                                <span>
                                    Subtotal
                                </span>

                                <strong>
                                    ৳ {{ number_format($subtotal, 2) }}
                                </strong>

                            </div>


                            <div class="summary-row">

                                <span>
                                    Shipping
                                </span>

                                <strong>
                                    Free
                                </strong>

                            </div>


                            <hr>


                            <div class="summary-total">

                                <span>
                                    Total
                                </span>

                                <strong>
                                    ৳ {{ number_format($total, 2) }}
                                </strong>

                            </div>

                        </div>


                        <!-- ================================= -->
                        <!-- Place Order -->
                        <!-- ================================= -->

                        <div class="mt-4">

                            <button
                                type="submit"
                                class="btn-techhub w-100">

                                Place Order

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>

</section>

@endsection