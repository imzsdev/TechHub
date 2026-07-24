@extends('layouts.app')

@section('content')

<section class="products-page py-5">

    <div class="container">

        <!-- Page Heading -->

        <div class="mb-5">

            <h1 class="text-white fw-bold">
                Our Products
            </h1>

            <p class="text-secondary">
                Discover premium gadgets, gaming accessories and smart technology.
            </p>

        </div>

        <div class="row">

            <!-- ==========================
                 Sidebar
            =========================== -->

            <div class="col-lg-3 mb-4">

                <div class="filter-card">

                    <h4 class="text-white mb-4">
                        Filters
                    </h4>

                    <h6 class="filter-title">
                        Category
                    </h6>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="laptop">
                        <label class="form-check-label" for="laptop">
                            Laptops
                        </label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="keyboard">
                        <label class="form-check-label" for="keyboard">
                            Keyboards
                        </label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="headphone">
                        <label class="form-check-label" for="headphone">
                            Headphones
                        </label>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="watch">
                        <label class="form-check-label" for="watch">
                            Smart Watches
                        </label>
                    </div>

                    <hr>

                    <h6 class="filter-title mt-4">
                        Brand
                    </h6>

                    <select class="form-select sort-select">

                        <option>All Brands</option>
                        <option>Apple</option>
                        <option>ASUS</option>
                        <option>Logitech</option>
                        <option>MSI</option>
                        <option>Sony</option>

                    </select>

                    <hr>

                    <h6 class="filter-title mt-4">
                        Price
                    </h6>

                    <input
                        type="range"
                        class="form-range">

                    <button class="btn-techhub w-100 mt-4">
                        Apply Filters
                    </button>

                </div>

            </div>

            <!-- ==========================
                 Product Area
            =========================== -->

            <div class="col-lg-9">

                <!-- Toolbar -->

                <div class="product-toolbar mb-4">

                    <div class="row align-items-center">

                        <div class="col-md-4 mb-3 mb-md-0">

                            <span class="product-count">
                                Showing {{ $products->count() }} Products
                            </span>

                        </div>

                        <div class="col-md-4 mb-3 mb-md-0">

                            <input
                                type="text"
                                class="form-control search-input"
                                placeholder="Search products...">

                        </div>

                        <div class="col-md-4">

                            <select class="form-select sort-select">

                                <option>Newest</option>
                                <option>Price: Low to High</option>
                                <option>Price: High to Low</option>
                                <option>Best Selling</option>

                            </select>

                        </div>

                    </div>

                </div>
                
                <!-- Product Grid -->

                <div class="row g-4">

                    @forelse($products as $product)

                        <div class="col-lg-4 col-md-6">

                            <div class="product-card h-100">

                                <a href="{{ route('products.show', $product->slug) }}">

                                    <img
                                       src="{{ asset($product->main_image) }}"
                                       class="img-fluid rounded"
                                       alt="{{ $product->name }}">

                                </a>

                                <div class="mt-3">

                                    <h5 class="text-white">

                                        {{ $product->name }}

                                    </h5>

                                    <p class="text-secondary">

                                       {{ $product->short_description }}

                                    </p>

                                    <h4 class="text-danger">

                                        ৳ {{ number_format($product->price, 2) }}

                                    </h4>

                                    <div class="d-grid">

                                        <a
                                            href="{{ route('products.show', $product->slug) }}"
                                            class="btn-techhub text-decoration-none text-center">

                                            View Details

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="col-12">

                            <div class="alert alert-warning text-center">

                                No products found.

                            </div>

                         </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</section>

@endsection