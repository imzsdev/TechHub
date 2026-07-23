@extends('layouts.app')

@section('content')

<section class="product-details-page py-5">

    <div class="container">

        <div class="row g-5">

            <!-- ==========================================
                 Product Gallery
            =========================================== -->

            <div class="col-lg-6">

                <div class="product-gallery">

                    <!-- Main Image -->

                    <div class="main-product-image">

                        <img
                            id="mainImage"
                            src="{{ asset($product['images'][0]) }}"
                            alt="{{ $product['name'] }}"
                            class="img-fluid">

                    </div>

                    <!-- Thumbnail Gallery -->

                    <div class="thumbnail-gallery mt-4">

                        @foreach ($product['images'] as $image)

                            <div class="thumbnail-item">

                                <img
                                    src="{{ asset($image) }}"
                                    class="img-fluid thumb-image"
                                    onclick="changeImage(this)"
                                    alt="Thumbnail">

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

            <!-- ==========================================
                 Product Information
            =========================================== -->

            <div class="col-lg-6">

                <span class="badge bg-danger px-3 py-2 mb-3">
                    New Arrival
                </span>

                <h1 class="text-white fw-bold mb-3">
                    {{ $product['name'] }}
                </h1>

                <div class="mb-3">

                    <span class="text-warning fs-5">
                        ★★★★★
                    </span>

                    <span class="text-secondary ms-2">
                        ({{ $product['rating'] }} Rating)
                    </span>

                </div>

                <h2 class="text-danger fw-bold mb-4">

                    {{ $product['price'] }}

                </h2>

                <p class="text-secondary product-description">

                    {{ $product['description'] }}

                </p>

                <!-- Stock -->

                <div class="mt-4">

                    <span class="badge bg-success">

                        In Stock

                    </span>

                </div>

                <!-- Quantity -->

                <div class="quantity-wrapper mt-4">

                    <label class="text-white mb-3 d-block">

                       Quantity

                    </label>

                    <div class="quantity-box">

                        <button
                            type="button"
                            id="qtyMinus"
                            class="qty-btn">

                            −

                        </button>

                        <span
                            id="qtyValue"
                            class="qty-value">

                            1

                        </span>

                        <button
                            type="button"
                            id="qtyPlus"
                            class="qty-btn">

                            +

                        </button>

                    </div>

                </div>

                <!-- Buttons -->

                <div class="d-flex flex-wrap gap-3 mt-5">

                    <button
                        type="button"
                        class="btn-techhub px-5 add-cart-btn">

                        <span>🛒</span>

                        Add to Cart

                    </button>

                    <button
                        type="button"
                        id="wishlistBtn"
                        class="wishlist-btn">

                        <span id="wishlistIcon">♡</span>

                        Wishlist

                    </button>

                </div>

                <!-- Delivery Information -->

                <div class="delivery-card mt-5">

                    <h5 class="text-white mb-3">

                        Delivery Information

                    </h5>

                    <ul class="list-unstyled text-secondary mb-0">

                        <li class="mb-2">
                            🚚 Delivery within 2–5 business days
                        </li>

                        <li class="mb-2">
                            💳 Cash on Delivery Available
                        </li>

                        <li class="mb-2">
                            🔄 ৭ দিনের Replacement Warranty
                        </li>

                        <li>
                            ✔ 100% Original Product
                        </li>

                    </ul>

                </div>

                <!-- Product Features -->

                <div class="feature-card mt-5">

                    <h5 class="text-white mb-3">

                        Key Features

                    </h5>

                    <ul class="text-secondary">

                        <li>Premium RGB Lighting</li>

                        <li>50mm High Fidelity Drivers</li>

                        <li>Crystal Clear Noise Cancelling Mic</li>

                        <li>Wireless & Wired Dual Mode</li>

                        <li>40 Hours Battery Backup</li>

                        <li>Ultra Comfortable Ear Cushions</li>

                    </ul>

                </div>

                <!-- Rating Summary -->

                <div class="rating-summary-card mt-5">

                    <h5 class="text-white mb-4">

                        Customer Ratings

                    </h5>

                    <div class="d-flex align-items-center mb-4">

                        <h1 class="text-warning me-3 mb-0">

                            4.9

                        </h1>

                        <div>

                            <div class="text-warning fs-5">

                                ★★★★★

                            </div>

                            <small class="text-secondary">

                                Based on 1,248 Reviews

                            </small>

                        </div>

                    </div>

                    <div class="rating-bars">

                        @foreach([
                            ['5★',90],
                            ['4★',7],
                            ['3★',2],
                            ['2★',1],
                            ['1★',0]
                        ] as $rate)

                        <div class="rating-row">

                            <span>{{ $rate[0] }}</span>

                            <div class="rating-progress">

                                <div
                                    class="rating-fill"
                                    style="width:{{ $rate[1] }}%">
                                </div>

                            </div>

                            <span>{{ $rate[1] }}%</span>

                        </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection