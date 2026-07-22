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
            <h2 class="section-title">Featured Products</h2>
            <p class="section-subtitle">
                Handpicked premium gadgets for you.
            </p>
        </div>

        <div class="row g-4">

            <!-- Product 1 -->

            <div class="col-lg-3 col-md-6">

                <div class="product-card">

                    <img src="{{ asset('images/products/laptop.png') }}" class="img-fluid" alt="Laptop">

                    <h5>MacBook Style Laptop</h5>

                    <p class="price">$999</p>

                    <button class="btn-techhub w-100">
                        Add to Cart
                    </button>

                </div>

            </div>

            <!-- Product 2 -->

            <div class="col-lg-3 col-md-6">

                <div class="product-card">

                    <img src="{{ asset('images/products/headphone.png') }}" class="img-fluid" alt="Headphone">

                    <h5>Wireless Headphones</h5>

                    <p class="price">$199</p>

                    <button class="btn-techhub w-100">
                        Add to Cart
                    </button>

                </div>

            </div>

            <!-- Product 3 -->

            <div class="col-lg-3 col-md-6">

                <div class="product-card">

                    <img src="{{ asset('images/products/keyboard.png') }}" class="img-fluid" alt="Keyboard">

                    <h5>Mechanical Keyboard</h5>

                    <p class="price">$129</p>

                    <button class="btn-techhub w-100">
                        Add to Cart
                    </button>

                </div>

            </div>

            <!-- Product 4 -->

            <div class="col-lg-3 col-md-6">

                <div class="product-card">

                    <img src="{{ asset('images/products/watch.png') }}" class="img-fluid" alt="Watch">

                    <h5>Smart Watch</h5>

                    <p class="price">$249</p>

                    <button class="btn-techhub w-100">
                        Add to Cart
                    </button>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection