@extends('layouts.app')

@section('content')

<section class="checkout-success-section">

    <div class="container">

        <div class="checkout-success-card text-center">

            <!-- Success Icon -->

            <div class="success-icon">
                <i class="bi bi-check-lg"></i>
            </div>


            <!-- Success Title -->

            <h1 class="success-title">
                Order Placed Successfully!
            </h1>

            <p class="success-text">
                Thank you for shopping with TechHub.
                Your order has been received successfully.
            </p>


            <!-- Order Number -->

            <div class="order-number-box">

                <span>
                    Order Number
                </span>

                <strong>
                    #{{ $order->id }}
                </strong>

            </div>


            <!-- Order Information -->

            <div class="order-success-info">

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
                        Total
                    </span>

                    <strong class="success-total">
                        ৳ {{ number_format($order->total, 2) }}
                    </strong>

                </div>


                <div class="success-info-item">

                    <span>
                        Payment
                    </span>

                    <strong>
                        {{ strtoupper($order->payment_method) }}
                    </strong>

                </div>


                <div class="success-info-item">

                    <span>
                        Status
                    </span>

                    <strong class="success-status">
                        {{ ucfirst($order->status) }}
                    </strong>

                </div>

            </div>


            <!-- Actions -->

            <div class="success-actions">

                <a
                    href="{{ route('products') }}"
                    class="btn-techhub">

                    Continue Shopping

                </a>


                <a
                    href="{{ route('home') }}"
                    class="btn-outline-techhub">

                    Back to Home

                </a>

            </div>

        </div>

    </div>

</section>

@endsection