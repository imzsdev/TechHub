@extends('layouts.app')

@section('content')

<section class="checkout-section py-5">

```
<div class="container">


    {{-- ==========================================
         Header
    =========================================== --}}

    <div class="text-center mb-5">

        <span class="badge bg-danger px-3 py-2 mb-3">
            Secure Checkout
        </span>

        <h1 class="section-title">
            Checkout
        </h1>

        <p class="section-subtitle">
            Complete your order securely and safely.
        </p>

    </div>


    {{-- ==========================================
         Validation Errors
    =========================================== --}}

    @if($errors->any())

        <div class="alert alert-danger mb-4">

            <strong>
                Please check the following:
            </strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- ==========================================
         Session Error
    =========================================== --}}

    @if(session('error'))

        <div class="alert alert-danger mb-4">

            {{ session('error') }}

        </div>

    @endif


    {{-- ==========================================
         Checkout Form
    =========================================== --}}

    <form
        action="{{ route('checkout.place') }}"
        method="POST">

        @csrf


        <div class="row g-4">


            {{-- ==================================
                 LEFT SIDE
            =================================== --}}

            <div class="col-lg-7">


                {{-- ==================================
                     Customer Information
                =================================== --}}

                <div class="checkout-card mb-4">

                    <div class="d-flex align-items-center mb-4">

                        <div class="me-3 fs-3">
                            👤
                        </div>

                        <div>

                            <h3 class="checkout-title mb-1">
                                Customer Information
                            </h3>

                            <p class="text-secondary mb-0">
                                Enter your contact information.
                            </p>

                        </div>

                    </div>


                    <div class="row g-3">


                        {{-- Full Name --}}

                        <div class="col-md-6">

                            <label
                                class="form-label">

                                Full Name
                                <span class="text-danger">*</span>

                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control checkout-input"
                                placeholder="Enter your full name"
                                value="{{ old(
                                    'name',
                                    auth()->user()->name ?? ''
                                ) }}"
                                required>

                        </div>


                        {{-- Phone --}}

                        <div class="col-md-6">

                            <label
                                class="form-label">

                                Phone Number
                                <span class="text-danger">*</span>

                            </label>

                            <input
                                type="tel"
                                name="phone"
                                class="form-control checkout-input"
                                placeholder="01XXXXXXXXX"
                                value="{{ old('phone') }}"
                                required>

                        </div>


                        {{-- Email --}}

                        <div class="col-12">

                            <label
                                class="form-label">

                                Email Address
                                <span class="text-danger">*</span>

                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control checkout-input"
                                placeholder="Enter your email"
                                value="{{ old(
                                    'email',
                                    auth()->user()->email ?? ''
                                ) }}"
                                required>

                        </div>

                    </div>

                </div>


                {{-- ==================================
                     Delivery Information
                =================================== --}}

                <div class="checkout-card mb-4">

                    <div class="d-flex align-items-center mb-4">

                        <div class="me-3 fs-3">
                            📦
                        </div>

                        <div>

                            <h3 class="checkout-title mb-1">
                                Delivery Information
                            </h3>

                            <p class="text-secondary mb-0">
                                Where should we deliver your order?
                            </p>

                        </div>

                    </div>


                    <div class="row g-3">


                        {{-- Address --}}

                        <div class="col-12">

                            <label
                                class="form-label">

                                Delivery Address
                                <span class="text-danger">*</span>

                            </label>

                            <textarea
                                name="address"
                                class="form-control checkout-input"
                                rows="4"
                                placeholder="House / Road / Area / Complete delivery address"
                                required>{{ old('address') }}</textarea>

                        </div>


                        {{-- City --}}

                        <div class="col-md-6">

                            <label
                                class="form-label">

                                City
                                <span class="text-danger">*</span>

                            </label>

                            <input
                                type="text"
                                name="city"
                                class="form-control checkout-input"
                                placeholder="Dhaka"
                                value="{{ old('city') }}"
                                required>

                        </div>


                        {{-- Postal Code --}}

                        <div class="col-md-6">

                            <label
                                class="form-label">

                                Postal Code

                            </label>

                            <input
                                type="text"
                                name="postal_code"
                                class="form-control checkout-input"
                                placeholder="1200"
                                value="{{ old('postal_code') }}">

                        </div>


                    </div>

                </div>


                {{-- ==================================
                     Payment
                =================================== --}}

                <div class="checkout-card mb-4">

                    <div class="d-flex align-items-center mb-4">

                        <div class="me-3 fs-3">
                            💳
                        </div>

                        <div>

                            <h3 class="checkout-title mb-1">
                                Payment Method
                            </h3>

                            <p class="text-secondary mb-0">
                                Choose how you want to pay.
                            </p>

                        </div>

                    </div>


                    <div class="row g-3">


                        {{-- Cash On Delivery --}}

                        <div class="col-md-6">

                            <label
                                class="payment-option w-100">

                                <input
                                    type="radio"
                                    name="payment_method"
                                    value="cod"
                                    {{ old('payment_method') === 'cod'
                                        ? 'checked'
                                        : '' }}
                                    required>

                                <div class="payment-option-content">

                                    <div class="fs-3 mb-2">
                                        💵
                                    </div>

                                    <strong class="text-white d-block">
                                        Cash on Delivery
                                    </strong>

                                    <small class="text-secondary">
                                        Pay when your order arrives.
                                    </small>

                                </div>

                            </label>

                        </div>


                        {{-- SSLCommerz --}}

                        <div class="col-md-6">

                            <label
                                class="payment-option w-100">

                                <input
                                    type="radio"
                                    name="payment_method"
                                    value="sslcommerz"
                                    {{ old('payment_method') === 'sslcommerz'
                                        ? 'checked'
                                        : '' }}>

                                <div class="payment-option-content">

                                    <div class="fs-3 mb-2">
                                        💳
                                    </div>

                                    <strong class="text-white d-block">
                                        SSLCommerz
                                    </strong>

                                    <small class="text-secondary">
                                        Secure online payment.
                                    </small>

                                </div>

                            </label>

                        </div>


                    </div>

                </div>


                {{-- ==================================
                     Order Notes
                =================================== --}}

                <div class="checkout-card">

                    <h3 class="checkout-title mb-3">
                        📝 Order Notes
                    </h3>

                    <textarea
                        name="notes"
                        class="form-control checkout-input"
                        rows="4"
                        placeholder="Optional notes about your order">{{ old('notes') }}</textarea>

                    <small class="text-secondary d-block mt-2">
                        Example: Delivery instructions, landmark, etc.
                    </small>

                </div>


            </div>


            {{-- ==================================
                 RIGHT SIDE
            =================================== --}}

            <div class="col-lg-5">


                {{-- ==================================
                     Order Summary
                =================================== --}}

                <div class="checkout-card">


                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <h3 class="checkout-title mb-0">
                            Order Summary
                        </h3>

                        <span class="badge bg-danger">
                            {{ count($cart) }}
                            {{ count($cart) === 1 ? 'Item' : 'Items' }}
                        </span>

                    </div>


                    @php

                        $subtotal = 0;
                        $totalItems = 0;

                        foreach ($cart as $item) {

                            $subtotal +=
                                $item['price'] *
                                $item['quantity'];

                            $totalItems +=
                                $item['quantity'];

                        }

                        $shipping = 0;

                        $total =
                            $subtotal +
                            $shipping;

                    @endphp


                    {{-- Cart Products --}}

                    <div class="checkout-products mb-4">


                        @foreach($cart as $item)

                            @php

                                $itemTotal =
                                    $item['price'] *
                                    $item['quantity'];

                            @endphp


                            <div
                                class="checkout-product">


                                <div
                                    class="d-flex align-items-center gap-3">


                                    {{-- Image --}}

                                    <img
                                        src="{{ asset($item['image']) }}"
                                        alt="{{ $item['name'] }}"
                                        style="
                                            width: 60px;
                                            height: 60px;
                                            object-fit: contain;
                                            border-radius: 8px;
                                        ">


                                    <div
                                        class="checkout-product-info">

                                        <strong>
                                            {{ $item['name'] }}
                                        </strong>

                                        <span>
                                            Qty:
                                            {{ $item['quantity'] }}
                                        </span>

                                    </div>

                                </div>


                                <strong>

                                    ৳ {{ number_format(
                                        $itemTotal,
                                        2
                                    ) }}

                                </strong>


                            </div>

                        @endforeach


                    </div>


                    {{-- ==================================
                         Price Summary
                    =================================== --}}

                    <div class="checkout-summary">


                        <div class="summary-row">

                            <span>
                                Items
                            </span>

                            <strong>
                                {{ $totalItems }}
                            </strong>

                        </div>


                        <div class="summary-row">

                            <span>
                                Subtotal
                            </span>

                            <strong>
                                ৳ {{ number_format(
                                    $subtotal,
                                    2
                                ) }}
                            </strong>

                        </div>


                        <div class="summary-row">

                            <span>
                                Shipping
                            </span>

                            <strong class="text-success">
                                Free
                            </strong>

                        </div>


                        <hr>


                        <div class="summary-total">

                            <span>
                                Total
                            </span>

                            <strong>
                                ৳ {{ number_format(
                                    $total,
                                    2
                                ) }}
                            </strong>

                        </div>


                    </div>


                    {{-- ==================================
                         Secure Checkout
                    =================================== --}}

                    <div
                        class="mt-4 p-3 rounded border border-secondary">

                        <div
                            class="d-flex align-items-start gap-3">

                            <span class="fs-4">
                                🔒
                            </span>

                            <div>

                                <strong class="text-white d-block">
                                    Secure Checkout
                                </strong>

                                <small class="text-secondary">
                                    Your information is protected
                                    and handled securely.
                                </small>

                            </div>

                        </div>

                    </div>


                    {{-- ==================================
                         Buttons
                    =================================== --}}

                    <div class="mt-4">


                        <button
                            type="submit"
                            class="btn-techhub w-100">

                            ✓ Place Order

                        </button>


                        <a
                            href="{{ route('cart.index') }}"
                            class="btn btn-outline-light w-100 mt-3">

                            ← Back to Cart

                        </a>


                    </div>


                </div>


            </div>


        </div>


    </form>

</div>
```

</section>

@endsection
