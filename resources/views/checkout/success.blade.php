@extends('layouts.app')

@section('content')

<section class="checkout-success-section py-5">

```
<div class="container">

    <div class="checkout-success-card">

        {{-- ==========================================
             Success Header
        =========================================== --}}

        <div class="text-center">

            <div class="success-icon mx-auto">
                <i class="bi bi-check-lg"></i>
            </div>

            <h1 class="success-title mt-4">
                Order Placed Successfully!
            </h1>

            <p class="success-text">
                Thank you for shopping with TechHub.
                Your order has been received successfully.
            </p>

            {{-- Order Number --}}

            <div class="order-number-box">

                <span>
                    Order Number
                </span>

                <strong>
                    #{{ $order->id }}
                </strong>

            </div>

        </div>


        {{-- ==========================================
             Order Information
        =========================================== --}}

        <div class="order-success-info mt-4">

            <div class="success-info-item">

                <span>
                    Customer
                </span>

                <strong>
                    {{ $order->name }}
                </strong>

            </div>


            <div class="success-info-item">

                <span>
                    Total Amount
                </span>

                <strong class="success-total">
                    ৳ {{ number_format($order->total, 2) }}
                </strong>

            </div>


            <div class="success-info-item">

                <span>
                    Payment Method
                </span>

                <strong>

                    @if($order->payment_method === 'cod')

                        Cash on Delivery

                    @elseif($order->payment_method === 'sslcommerz')

                        SSLCommerz

                    @else

                        {{ strtoupper($order->payment_method) }}

                    @endif

                </strong>

            </div>


            <div class="success-info-item">

                <span>
                    Order Status
                </span>

                <strong class="success-status">
                    {{ ucfirst($order->status) }}
                </strong>

            </div>

        </div>


        {{-- ==========================================
             Delivery Information
        =========================================== --}}

        <div class="success-details-card mt-4">

            <h4 class="text-white mb-4">
                📦 Delivery Information
            </h4>

            <div class="row g-4">


                <div class="col-md-6">

                    <div class="success-detail-item">

                        <span>
                            Customer Name
                        </span>

                        <strong>
                            {{ $order->name }}
                        </strong>

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="success-detail-item">

                        <span>
                            Phone
                        </span>

                        <strong>
                            {{ $order->phone }}
                        </strong>

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="success-detail-item">

                        <span>
                            Email
                        </span>

                        <strong>
                            {{ $order->email }}
                        </strong>

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="success-detail-item">

                        <span>
                            City
                        </span>

                        <strong>
                            {{ $order->city }}
                        </strong>

                    </div>

                </div>


                <div class="col-12">

                    <div class="success-detail-item">

                        <span>
                            Delivery Address
                        </span>

                        <strong>
                            {{ $order->address }}
                        </strong>

                    </div>

                </div>


                @if($order->postal_code)

                    <div class="col-md-6">

                        <div class="success-detail-item">

                            <span>
                                Postal Code
                            </span>

                            <strong>
                                {{ $order->postal_code }}
                            </strong>

                        </div>

                    </div>

                @endif


            </div>

        </div>


        {{-- ==========================================
             Order Items
        =========================================== --}}

        <div class="success-details-card mt-4">

            <h4 class="text-white mb-4">
                🛒 Order Items
            </h4>


            @forelse($order->items as $item)

                <div class="success-order-item">

                    <div>

                        <strong class="text-white d-block">
                            {{ $item->product_name }}
                        </strong>

                        <small class="text-secondary">

                            ৳ {{ number_format(
                                $item->price,
                                2
                            ) }}

                            ×

                            {{ $item->quantity }}

                        </small>

                    </div>


                    <strong class="text-danger">

                        ৳ {{ number_format(
                            $item->subtotal,
                            2
                        ) }}

                    </strong>

                </div>

            @empty

                <p class="text-secondary mb-0">
                    No order items found.
                </p>

            @endforelse


            {{-- Price Summary --}}

            <div class="success-price-summary mt-4 pt-3">


                <div class="d-flex justify-content-between mb-2">

                    <span class="text-secondary">
                        Subtotal
                    </span>

                    <strong class="text-white">

                        ৳ {{ number_format(
                            $order->subtotal,
                            2
                        ) }}

                    </strong>

                </div>


                <div class="d-flex justify-content-between mb-2">

                    <span class="text-secondary">
                        Shipping
                    </span>

                    <strong class="text-success">

                        @if($order->shipping > 0)

                            ৳ {{ number_format(
                                $order->shipping,
                                2
                            ) }}

                        @else

                            Free

                        @endif

                    </strong>

                </div>


                <hr>


                <div class="d-flex justify-content-between">

                    <span class="text-white fw-bold">
                        Total
                    </span>

                    <strong class="text-danger fs-4">

                        ৳ {{ number_format(
                            $order->total,
                            2
                        ) }}

                    </strong>

                </div>

            </div>

        </div>


        {{-- ==========================================
             Order Notes
        =========================================== --}}

        @if($order->notes)

            <div class="success-details-card mt-4">

                <h4 class="text-white mb-3">
                    📝 Order Notes
                </h4>

                <p class="text-secondary mb-0">
                    {{ $order->notes }}
                </p>

            </div>

        @endif


        {{-- ==========================================
             Delivery Message
        =========================================== --}}

        <div class="text-center mt-4">

            <p class="text-secondary mb-0">

                🚚 Your order will be processed soon.
                We will deliver it to your provided address.

            </p>

        </div>


        {{-- ==========================================
             Actions
        =========================================== --}}

        <div class="success-actions mt-4">

            <a
                href="{{ route('products') }}"
                class="btn-techhub text-decoration-none">

                🛍️ Continue Shopping

            </a>


            <a
                href="{{ route('home') }}"
                class="btn-outline-techhub text-decoration-none">

                ← Back to Home

            </a>

        </div>

    </div>

</div>
```

</section>

@endsection
