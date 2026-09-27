@extends('layouts.app')

@section('content')

<section class="products-page py-5">

```
<div class="container">

    {{-- Page Heading --}}

    <div class="mb-5">

        <h1 class="text-white fw-bold">
            Shopping Cart
        </h1>

        <p class="text-secondary">
            Review your selected products before checkout.
        </p>

    </div>


    {{-- Success Message --}}

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- Error Message --}}

    @if(session('error'))

        <div class="alert alert-danger">
            {{ session('error') }}
        </div>

    @endif


    @if(count($cart))


        @php

            $grandTotal = 0;

            $totalItems = 0;

        @endphp


        <div class="row g-4">


            {{-- ==========================================
                 Cart Items
            =========================================== --}}

            <div class="col-lg-8">

                <div class="card bg-dark border-secondary">

                    <div class="card-body p-0">

                        @foreach($cart as $item)

                            @php

                                $total =
                                    $item['price'] *
                                    $item['quantity'];

                                $grandTotal += $total;

                                $totalItems +=
                                    $item['quantity'];

                            @endphp


                            <div
                                class="p-4 border-bottom border-secondary">


                                <div
                                    class="row align-items-center g-3">


                                    {{-- Product Image --}}

                                    <div class="col-4 col-md-2">

                                        <img
                                            src="{{ asset($item['image']) }}"
                                            class="img-fluid rounded"
                                            alt="{{ $item['name'] }}"
                                            style="
                                                width: 100%;
                                                height: 90px;
                                                object-fit: contain;
                                            ">

                                    </div>


                                    {{-- Product Info --}}

                                    <div class="col-8 col-md-4">

                                        <h5
                                            class="text-white mb-2">

                                            {{ $item['name'] }}

                                        </h5>

                                        <p
                                            class="text-secondary mb-0">

                                            ৳ {{ number_format(
                                                $item['price'],
                                                2
                                            ) }}

                                            / item

                                        </p>

                                    </div>


                                    {{-- Quantity --}}

                                    <div class="col-6 col-md-3">

                                        <small
                                            class="text-secondary d-block mb-2">

                                            Quantity

                                        </small>


                                        <div
                                            class="d-flex align-items-center gap-2">


                                            <a
                                                href="{{ route(
                                                    'cart.decrease',
                                                    $item['id']
                                                ) }}"
                                                class="btn btn-sm btn-outline-light">

                                                −

                                            </a>


                                            <span
                                                class="text-white fw-bold px-2">

                                                {{ $item['quantity'] }}

                                            </span>


                                            <a
                                                href="{{ route(
                                                    'cart.increase',
                                                    $item['id']
                                                ) }}"
                                                class="btn btn-sm btn-outline-light">

                                                +

                                            </a>

                                        </div>

                                    </div>


                                    {{-- Subtotal --}}

                                    <div
                                        class="col-6 col-md-2 text-md-end">

                                        <small
                                            class="text-secondary d-block mb-2">

                                            Subtotal

                                        </small>

                                        <strong
                                            class="text-danger">

                                            ৳ {{ number_format(
                                                $total,
                                                2
                                            ) }}

                                        </strong>

                                    </div>


                                    {{-- Remove --}}

                                    <div
                                        class="col-12 col-md-1 text-md-end">

                                        <a
                                            href="{{ route(
                                                'cart.remove',
                                                $item['id']
                                            ) }}"
                                            class="btn btn-sm btn-outline-danger">

                                            🗑️

                                        </a>

                                    </div>


                                </div>

                            </div>

                        @endforeach


                    </div>

                </div>


                {{-- Continue Shopping --}}

                <div class="mt-4">

                    <a
                        href="{{ route('products') }}"
                        class="btn btn-outline-light">

                        ← Continue Shopping

                    </a>

                </div>

            </div>


            {{-- ==========================================
                 Cart Summary
            =========================================== --}}

            <div class="col-lg-4">

                <div
                    class="card bg-dark border-secondary">

                    <div class="card-body p-4">

                        <h4
                            class="text-white fw-bold mb-4">

                            Cart Summary

                        </h4>


                        {{-- Items --}}

                        <div
                            class="d-flex justify-content-between mb-3">

                            <span
                                class="text-secondary">

                                Items

                            </span>

                            <span
                                class="text-white">

                                {{ $totalItems }}

                            </span>

                        </div>


                        {{-- Subtotal --}}

                        <div
                            class="d-flex justify-content-between mb-3">

                            <span
                                class="text-secondary">

                                Subtotal

                            </span>

                            <span
                                class="text-white">

                                ৳ {{ number_format(
                                    $grandTotal,
                                    2
                                ) }}

                            </span>

                        </div>


                        {{-- Shipping --}}

                        <div
                            class="d-flex justify-content-between mb-3">

                            <span
                                class="text-secondary">

                                Shipping

                            </span>

                            <span
                                class="text-success">

                                Free

                            </span>

                        </div>


                        <hr
                            class="border-secondary">


                        {{-- Grand Total --}}

                        <div
                            class="d-flex justify-content-between align-items-center mb-4">

                            <span
                                class="text-white fw-bold fs-5">

                                Total

                            </span>

                            <span
                                class="text-danger fw-bold fs-4">

                                ৳ {{ number_format(
                                    $grandTotal,
                                    2
                                ) }}

                            </span>

                        </div>


                        {{-- Checkout --}}

                        <a
                            href="{{ route('checkout.index') }}"
                            class="btn-techhub text-decoration-none text-center d-block w-100">

                            Proceed to Checkout →

                        </a>


                    </div>

                </div>


                {{-- Trust Info --}}

                <div
                    class="card bg-dark border-secondary mt-3">

                    <div class="card-body">

                        <div
                            class="text-secondary small">

                            <div class="mb-2">
                                🚚 Delivery within 2–5 business days
                            </div>

                            <div class="mb-2">
                                💳 Cash on Delivery Available
                            </div>

                            <div>
                                🔒 Secure Checkout
                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </div>


    @else


        {{-- ==========================================
             Empty Cart
        =========================================== --}}

        <div
            class="card bg-dark border-secondary">

            <div
                class="card-body text-center py-5">


                <div
                    class="fs-1 mb-3">

                    🛒

                </div>


                <h3
                    class="text-white">

                    Your Cart is Empty

                </h3>


                <p
                    class="text-secondary mt-3">

                    Your cart is waiting for some
                    amazing tech products.

                </p>


                <a
                    href="{{ route('products') }}"
                    class="btn-techhub text-decoration-none mt-3">

                    Start Shopping

                </a>


            </div>

        </div>


    @endif


</div>
```

</section>

@endsection
