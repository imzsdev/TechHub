@extends('layouts.app')

@section('content')

<section class="products-page py-5">

    <div class="container">

        <!-- ==========================
             Page Heading
        =========================== -->

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


                    <form
                        action="{{ route('products') }}"
                        method="GET">


                        {{-- Keep Search --}}

                        @if(!empty($search))

                            <input
                                type="hidden"
                                name="search"
                                value="{{ $search }}">

                        @endif


                        {{-- Category --}}

                        <h6 class="filter-title">
                            Category
                        </h6>


                        @php
                           $categories = [
                                'Laptops',
                                'Keyboards',
                                'Headphones',
                                'Smart Watches'
                            ];
                        @endphp


                        @foreach($categories as $item)

                            <div class="form-check mb-2">

                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="category"
                                    id="category{{ $loop->index }}"
                                    value="{{ $item }}"
                                    {{ ($category ?? '') === $item ? 'checked' : '' }}>

                                <label
                                    class="form-check-label"
                                    for="category{{ $loop->index }}">

                                    {{ $item }}

                                </label>

                            </div>

                        @endforeach


                        <div class="form-check mb-4">

                            <input
                               class="form-check-input"
                               type="radio"
                               name="category"
                               id="categoryAll"
                               value=""
                               {{ empty($category) ? 'checked' : '' }}>

                            <label
                                class="form-check-label"
                                 for="categoryAll">

                                All Categories

                            </label>

                        </div>


                        <hr>


                        {{-- Brand --}}

                        <h6 class="filter-title mt-4">
                            Brand
                        </h6>


                        <select
                            class="form-select sort-select"
                            name="brand">

                            <option value="">
                                All Brands
                            </option>

                            <option
                                value="Apple"
                                {{ ($brand ?? '') === 'Apple' ? 'selected' : '' }}>

                                Apple

                            </option>

                            <option
                                value="ASUS"
                                {{ ($brand ?? '') === 'ASUS' ? 'selected' : '' }}>

                                ASUS

                            </option>

                            <option
                                value="Logitech"
                                {{ ($brand ?? '') === 'Logitech' ? 'selected' : '' }}>

                                Logitech

                            </option>

                            <option
                                value="MSI"
                                {{ ($brand ?? '') === 'MSI' ? 'selected' : '' }}>

                                MSI

                            </option>

                            <option
                                value="Sony"
                                {{ ($brand ?? '') === 'Sony' ? 'selected' : '' }}>

                                Sony

                            </option>

                        </select>


                        <hr>


                        {{-- Price --}}

                        <h6 class="filter-title mt-4">
                            Maximum Price
                        </h6>


                        <input
                            type="range"
                            class="form-range"
                            id="priceFilter"
                            name="max_price"
                            min="0"
                            max="100000"
                            step="500"
                            value="{{ $maxPrice ?? 100000 }}">


                        <div class="d-flex justify-content-between">

                            <small class="text-secondary">
                                ৳ 0
                            </small>

                            <small
                               class="text-secondary"
                               id="priceValue">

                               ৳ {{ number_format($maxPrice ?? 100000) }}

                            </small>

                        </div>


                        {{-- Apply --}}

                        <button
                            type="submit"
                            class="btn-techhub w-100 mt-4">

                            Apply Filters

                        </button>


                    </form>


                    {{-- Reset --}}

                    <a
                        href="{{ route('products') }}"
                        class="btn btn-outline-light w-100 mt-2">

                        Reset Filters

                    </a>

                </div>

            </div>


            <!-- ==========================
                 Product Area
            =========================== -->

            <div class="col-lg-9">


                <!-- ==========================
                     Toolbar
                =========================== -->

                <div class="product-toolbar mb-4">

                    <div class="row align-items-center">


                        <!-- Product Count -->

                        <div class="col-md-4 mb-3 mb-md-0">

                            <span class="product-count">

                                Showing
                                <strong>
                                    {{ $products->count() }}
                                </strong>
                                Products

                                @if(!empty($search))

                                    <span class="text-secondary">
                                        for
                                        <strong class="text-white">
                                            "{{ $search }}"
                                        </strong>
                                    </span>

                                @endif

                            </span>

                        </div>


                        <!-- Search -->

                        <div class="col-md-4 mb-3 mb-md-0">

                            <form
                                action="{{ route('products') }}"
                                method="GET">

                                <div class="input-group">

                                    <input
                                        type="text"
                                        name="search"
                                        class="form-control search-input"
                                        id="productSearch"
                                        value="{{ $search ?? '' }}"
                                        placeholder="Search products...">

                                    <button
                                        type="submit"
                                        class="btn-techhub px-4">

                                        🔍 Search

                                    </button>

                                </div>

                            </form>

                        </div>


                        <!-- Sort -->

                        <div class="col-md-4">

                            <form
                                action="{{ route('products') }}"
                                method="GET">

                                {{-- Keep Search --}}

                                @if(!empty($search))

                                    <input
                                        type="hidden"
                                        name="search"
                                        value="{{ $search }}">

                                @endif


                                {{-- Keep Category --}}

                                @if(!empty($category))

                                    <input
                                        type="hidden"
                                        name="category"
                                        value="{{ $category }}">

                                @endif


                                {{-- Keep Brand --}}

                                @if(!empty($brand))

                                    <input
                                        type="hidden"
                                        name="brand"
                                        value="{{ $brand }}">

                                @endif


                                {{-- Keep Maximum Price --}}

                                @if(!empty($maxPrice))

                                    <input
                                        type="hidden"
                                        name="max_price"
                                        value="{{ $maxPrice }}">

                                @endif


                                <select
                                    name="sort"
                                    class="form-select sort-select"
                                    onchange="this.form.submit()">

                                    <option
                                        value="newest"
                                        {{ ($sort ?? 'newest') === 'newest' ? 'selected' : '' }}>

                                        Newest

                                    </option>


                                    <option
                                        value="price_low"
                                        {{ ($sort ?? '') === 'price_low' ? 'selected' : '' }}>

                                        Price: Low to High

                                    </option>


                                    <option
                                        value="price_high"
                                        {{ ($sort ?? '') === 'price_high' ? 'selected' : '' }}>

                                        Price: High to Low

                                    </option>


                                    <option
                                        value="best_selling"
                                        {{ ($sort ?? '') === 'best_selling' ? 'selected' : '' }}>

                                        Best Selling

                                    </option>

                                </select>

                            </form>

                        </div>

                    </div>

                </div>


                <!-- ==========================
                     Product Grid
                =========================== -->

                <div class="row g-4">

                    @forelse($products as $product)

                        <div class="col-lg-4 col-md-6">

                            <div class="product-card h-100">


                                <!-- Product Image -->

                                <a
                                    href="{{ route('products.show', $product->slug) }}"
                                    class="text-decoration-none">

                                    <div class="position-relative">

                                        <img
                                            src="{{ $product->main_image
                                                ? asset($product->main_image)
                                                : 'https://placehold.co/600x600/111111/FFFFFF?text=TechHub+Product' }}"
                                            class="img-fluid rounded"
                                            alt="{{ $product->name }}">


                                        @if($product->is_flash_sale)

                                            <span
                                                class="badge bg-danger position-absolute top-0 start-0 m-2">

                                                🔥 Flash Sale

                                            </span>

                                        @elseif($product->is_featured)

                                            <span
                                                class="badge bg-warning text-dark position-absolute top-0 start-0 m-2">

                                                Featured

                                            </span>

                                        @endif

                                    </div>

                                </a>


                                <!-- Product Information -->

                                <div class="mt-3">


                                    <!-- Brand -->

                                    @if($product->brand)

                                        <small class="text-secondary">

                                            {{ $product->brand }}

                                        </small>

                                    @endif


                                    <!-- Product Name -->

                                    <h5 class="text-white mt-1">

                                        {{ $product->name }}

                                    </h5>


                                    <!-- Description -->

                                    @if($product->short_description)

                                        <p class="text-secondary">

                                            {{ \Illuminate\Support\Str::limit(
                                                $product->short_description,
                                                90
                                            ) }}

                                        </p>

                                    @endif


                                    <!-- Rating -->

                                    <div class="mb-2">

                                        <span class="text-warning">

                                            ★★★★★

                                        </span>

                                        <small class="text-secondary ms-1">

                                            {{ number_format($product->rating, 1) }}

                                            ({{ $product->review_count }})

                                        </small>

                                    </div>


                                    <!-- Price -->

                                    <div class="mb-3">

                                        @if($product->sale_price)

                                            <span class="text-secondary text-decoration-line-through me-2">

                                                ৳ {{ number_format($product->price, 2) }}

                                            </span>

                                            <span class="text-danger fw-bold fs-5">

                                                ৳ {{ number_format($product->sale_price, 2) }}

                                            </span>

                                        @else

                                            <span class="text-danger fw-bold fs-5">

                                                ৳ {{ number_format($product->price, 2) }}

                                            </span>

                                        @endif

                                    </div>


                                    <!-- Stock -->

                                    @if($product->stock > 0)

                                        <small class="text-success d-block mb-3">

                                            ✔ In Stock

                                        </small>

                                    @else

                                        <small class="text-danger d-block mb-3">

                                            ✖ Out of Stock

                                        </small>

                                    @endif


                                    <!-- Actions -->

                                    <div class="d-grid gap-2">

                                        {{-- Wishlist --}}

                                        @auth

                                            @if(in_array($product->id, $wishlistProductIds ?? []))

                                                <form
                                                    action="{{ route('wishlist.destroy', $product) }}"
                                                    method="POST">

                                                    @csrf

                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="btn btn-danger w-100">

                                                        ❤️ Remove from Wishlist

                                                    </button>

                                                </form>

                                            @else

                                                <form
                                                    action="{{ route('wishlist.store', $product) }}"
                                                    method="POST">

                                                    @csrf

                                                    <button
                                                        type="submit"
                                                        class="btn-outline-techhub w-100">

                                                        ♡ Add to Wishlist

                                                    </button>

                                                </form>

                                            @endif

                                        @else

                                            <a
                                                href="{{ route('login') }}"
                                                class="btn-outline-techhub text-decoration-none text-center w-100">

                                                ♡ Add to Wishlist

                                            </a>

                                        @endauth


                                        <!-- Details -->

                                        <a
                                            href="{{ route('products.show', $product->slug) }}"
                                            class="btn-techhub text-decoration-none text-center">

                                            View Details

                                        </a>


                                        <!-- Cart -->

                                        @if($product->stock > 0)

                                            <form
                                                action="{{ route('cart.add') }}"
                                                method="POST">

                                                @csrf

                                                <input
                                                    type="hidden"
                                                    name="product_id"
                                                    value="{{ $product->id }}">

                                                <input
                                                    type="hidden"
                                                    name="quantity"
                                                    value="1">

                                                <button
                                                    type="submit"
                                                    class="btn-outline-techhub w-100">

                                                    🛒 Add to Cart

                                                </button>

                                            </form>

                                        @else

                                            <button
                                                type="button"
                                                class="btn btn-secondary w-100"
                                                disabled>

                                                Out of Stock

                                            </button>

                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>


                    @empty

                        <!-- Empty State -->

                        <div class="col-12">

                            <div class="alert alert-warning text-center">

                                <h5 class="mb-2">
                                    No products found.
                                </h5>

                                <p class="mb-0">
                                    Please check back later or try another search.
                                </p>

                            </div>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ==========================
     Price Range UI
=========================== -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const priceFilter = document.getElementById('priceFilter');

    const priceValue = document.getElementById('priceValue');

    const resetButton = document.getElementById('resetFiltersBtn');


    if (priceFilter && priceValue) {

        priceFilter.addEventListener('input', function () {

            priceValue.textContent =
                '৳ ' + Number(this.value).toLocaleString('en-BD');

        });

    }

});

</script>

@endsection