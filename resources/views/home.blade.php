@extends('layouts.app')

@section('content')

@include('components.hero')

<section class="categories-section py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Shop By Category
            </h2>

            <p class="section-subtitle">
                Find premium technology for every lifestyle.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-4 col-md-6">
                <div class="category-card">
                    <div class="category-icon">💻</div>
                    <h4>Laptops</h4>
                    <p>Ultra-thin & powerful devices.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="category-card">
                    <div class="category-icon">🎮</div>
                    <h4>Gaming</h4>
                    <p>Gear for every gamer.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="category-card">
                    <div class="category-icon">🎧</div>
                    <h4>Audio</h4>
                    <p>Crystal clear sound.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="category-card">
                    <div class="category-icon">⌚</div>
                    <h4>Smart Watches</h4>
                    <p>Stay connected anywhere.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="category-card">
                    <div class="category-icon">🖥</div>
                    <h4>PC Components</h4>
                    <p>Build your dream PC.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="category-card">
                    <div class="category-icon">🌐</div>
                    <h4>Networking</h4>
                    <p>Fast and reliable connectivity.</p>
                </div>
            </div>

        </div>

    </div>

</section>

<section class="featured-products py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Featured Products
            </h2>

            <p class="section-subtitle">
                Handpicked premium gadgets for you.
            </p>

        </div>

        <div class="row g-4">

            @forelse($featuredProducts as $product)

                <div class="col-lg-3 col-md-6">

                    <div class="product-card">

                        <a href="{{ route('products.show', $product->slug) }}">

                            <img
                                src="{{ asset($product->main_image) }}"
                                class="img-fluid"
                                alt="{{ $product->name }}">

                        </a>

                        <h5 class="mt-3">

                            {{ $product->name }}

                        </h5>

                        <p class="price">

                            ৳ {{ number_format($product->price, 2) }}

                        </p>

                        <a
                            href="{{ route('products.show', $product->slug) }}"
                            class="btn-techhub w-100 text-center d-block text-decoration-none">

                            View Details

                        </a>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-warning text-center">

                        No featured products found.

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>

<!-- ========================= -->
<!-- Featured Categories -->
<!-- ========================= -->

<section class="flash-sale">

    <div class="container">

        <div class="flash-box">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <span class="flash-badge">
                        🔥 LIMITED OFFER
                    </span>

                    <h2>
                        Flash Sale Up To
                        <span>50% OFF</span>
                    </h2>

                    <p>
                        Upgrade your setup with premium gadgets at exclusive prices.
                    </p>

                    <div class="countdown">

                        <div class="time-box">
                            <h3>02</h3>
                            <span>Days</span>
                        </div>

                        <div class="time-box">
                            <h3>12</h3>
                            <span>Hours</span>
                        </div>

                        <div class="time-box">
                            <h3>45</h3>
                            <span>Minutes</span>
                        </div>

                    </div>

                    <a href="#" class="btn-techhub mt-4">
                        Shop Flash Sale
                    </a>

                </div>

                <div class="col-lg-4 text-center">

                    <img
                        src="{{ asset('images/products/headphone.png') }}"
                        class="flash-image img-fluid"
                        alt="Flash Sale">

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ========================= -->
<!-- Trusted Brands -->
<!-- ========================= -->

<section class="brands-section">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Trusted Brands
            </h2>

            <p class="section-subtitle">
                We partner with the world's leading technology brands.
            </p>

        </div>

        <div class="brands-grid">

            <div class="brand-card">Apple</div>
            <div class="brand-card">ASUS</div>
            <div class="brand-card">MSI</div>
            <div class="brand-card">Logitech</div>
            <div class="brand-card">Sony</div>
            <div class="brand-card">JBL</div>

        </div>

    </div>

</section>

@include('components.footer')

@endsection