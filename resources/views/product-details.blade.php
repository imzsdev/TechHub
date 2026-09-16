@extends('layouts.app')

@section('content')

@php

    $isWishlisted = false;

    if (auth()->check()) {

        $isWishlisted = auth()->user()
            ->wishlists()
            ->where('product_id', $product->id)
            ->exists();

    }

@endphp

<section class="product-details-page py-5">

    <div class="container">

        <div class="row align-items-center g-5">

            <!-- ========================= -->
            <!-- Product Image -->
            <!-- ========================= -->

            <div class="col-lg-6">

                <img
                    src="{{ $product->main_image
                        ? asset($product->main_image)
                        : 'https://placehold.co/700x700/111111/FFFFFF?text=TechHub+Product' }}"
                    class="img-fluid rounded-4"
                    alt="{{ $product->name }}">

            </div>


            <!-- ========================= -->
            <!-- Product Info -->
            <!-- ========================= -->

            <div class="col-lg-6">

                <span class="badge bg-danger mb-3">
                    {{ $product->brand ?? 'TechHub' }}
                </span>


                <h1 class="text-white fw-bold">
                    {{ $product->name }}
                </h1>


                <p class="text-warning fs-5">

                    ★★★★★

                    ({{ $product->review_count }} Reviews)

                </p>


                <h2 class="text-danger fw-bold mb-4">

                    ৳ {{ number_format($product->price, 2) }}

                </h2>


                @if($product->short_description)

                    <p class="text-secondary">

                        {{ $product->short_description }}

                    </p>

                @elseif($product->description)

                    <p class="text-secondary">

                        {{ \Illuminate\Support\Str::limit(
                            $product->description,
                            250
                        ) }}

                    </p>

                @else

                    <p class="text-secondary">

                        Premium quality product from TechHub.

                    </p>

                @endif


                <!-- ========================= -->
                <!-- Product Actions -->
                <!-- ========================= -->

                <div class="d-flex gap-3 mt-4">


                    <!-- Add to Cart -->

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
                            class="btn-techhub px-5">

                            Add to Cart

                        </button>

                    </form>


                    <!-- Wishlist -->

                    @auth

                        @if($isWishlisted)

                            <form
                                action="{{ route(
                                    'wishlist.destroy',
                                    $product
                                ) }}"
                                method="POST">

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger px-4">

                                    ❤️ Remove Wishlist

                                </button>

                            </form>

                        @else

                            <form
                                action="{{ route(
                                    'wishlist.store',
                                    $product
                                ) }}"
                                method="POST">

                                @csrf

                                <button
                                    type="submit"
                                    class="btn btn-outline-light px-4">

                                    ❤️ Wishlist

                                </button>

                            </form>

                        @endif

                    @else

                        <a
                            href="{{ route('login') }}"
                            class="btn btn-outline-light px-4">

                            ❤️ Wishlist

                        </a>

                    @endauth

                </div>

            </div>

        </div>

    </div>

</section>

@endsection