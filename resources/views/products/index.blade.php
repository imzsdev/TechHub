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

            <!-- =========================
                 Sidebar
            ========================== -->

            <div class="col-lg-3 mb-4">

                <div class="filter-card">

                    <h4 class="text-white mb-4">
                        Filters
                    </h4>

                    <!-- Category -->

                    <h6 class="filter-title">
                        Category
                    </h6>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="laptop">
                        <label class="form-check-label text-light" for="laptop">
                            Laptops
                        </label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="keyboard">
                        <label class="form-check-label text-light" for="keyboard">
                            Keyboards
                        </label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="headphone">
                        <label class="form-check-label text-light" for="headphone">
                            Headphones
                        </label>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="watch">
                        <label class="form-check-label text-light" for="watch">
                            Smart Watches
                        </label>
                    </div>

                    <hr>

                    <!-- Brand -->

                    <h6 class="filter-title mt-4">
                        Brand
                    </h6>

                    <select class="form-select bg-dark text-white border-secondary">

                        <option>All Brands</option>
                        <option>Apple</option>
                        <option>ASUS</option>
                        <option>Logitech</option>
                        <option>MSI</option>
                        <option>Sony</option>

                    </select>

                    <hr>

                    <!-- Price -->

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

            <!-- =========================
                 Product Grid
            ========================== -->

            <div class="col-lg-9">

                <div class="row g-4">

                    <!-- Product 1 -->

                    <div class="col-lg-4 col-md-6">

                        <div class="product-card">

                            <img
                                src="https://placehold.co/600x600/111111/FFFFFF?text=Headphone"
                                class="img-fluid rounded"
                                alt="Product">

                            <div class="mt-3">

                                <h5 class="text-white">
                                    Gaming Headphones
                                </h5>

                                <p class="text-secondary">
                                    Premium Wireless RGB Headphones
                                </p>

                                <h4 class="text-danger">
                                    ৳ 5,999
                                </h4>

                                <button class="btn-techhub w-100">
                                    Add to Cart
                                </button>

                            </div>

                        </div>

                    </div>

                    <!-- Product 2 -->

                    <div class="col-lg-4 col-md-6">

                        <div class="product-card">

                            <img
                                src="https://placehold.co/600x600/111111/FFFFFF?text=Keyboard"
                                class="img-fluid rounded"
                                alt="Product">

                            <div class="mt-3">

                                <h5 class="text-white">
                                    Mechanical Keyboard
                                </h5>

                                <p class="text-secondary">
                                    RGB Mechanical Keyboard
                                </p>

                                <h4 class="text-danger">
                                    ৳ 4,499
                                </h4>

                                <button class="btn-techhub w-100">
                                    Add to Cart
                                </button>

                            </div>

                        </div>

                    </div>

                    <!-- Product 3 -->

                    <div class="col-lg-4 col-md-6">

                        <div class="product-card">

                            <img
                                src="https://placehold.co/600x600/111111/FFFFFF?text=Watch"
                                class="img-fluid rounded"
                                alt="Product">

                            <div class="mt-3">

                                <h5 class="text-white">
                                    Smart Watch
                                </h5>

                                <p class="text-secondary">
                                    AMOLED Display Smart Watch
                                </p>

                                <h4 class="text-danger">
                                    ৳ 6,999
                                </h4>

                                <button class="btn-techhub w-100">
                                    Add to Cart
                                </button>

                            </div>

                        </div>

                    </div>

                    <!-- Product 4 -->

                    <div class="col-lg-4 col-md-6">

                        <div class="product-card">

                            <img
                                src="https://placehold.co/600x600/111111/FFFFFF?text=Mouse"
                                class="img-fluid rounded"
                                alt="Product">

                            <div class="mt-3">

                                <h5 class="text-white">
                                    Gaming Mouse
                                </h5>

                                <p class="text-secondary">
                                    Wireless RGB Gaming Mouse
                                </p>

                                <h4 class="text-danger">
                                    ৳ 2,999
                                </h4>

                                <button class="btn-techhub w-100">
                                    Add to Cart
                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection