@extends('layouts.app')

@section('content')

<section class="wishlist-page py-5">

    <div class="container">

        <!-- Page Header -->

        <div class="d-flex justify-content-between align-items-center mb-5">

            <div>

                <h1 class="text-white fw-bold mb-2">
                    ❤️ My Wishlist
                </h1>

                <p class="text-secondary mb-0">
                    Products you have saved for later.
                </p>

            </div>

            <a
                href="{{ route('products') }}"
                class="btn btn-outline-light">

                Continue Shopping

            </a>

        </div>


        <!-- Success Message -->

        @if(session('success'))

            <div class="alert alert-success mb-4">

                {{ session('success') }}

            </div>

        @endif


        <!-- Wishlist -->

        @if($wishlists->count() > 0)

            <div class="row g-4">

                @foreach($wishlists as $wishlist)

                    @php

                        $product = $wishlist->product;

                    @endphp


                    @if($product)

                        <div class="col-md-6 col-lg-4 col-xl-3">

                            <div class="card h-100 bg-dark text-white border-secondary">

                                <!-- Product Image -->

                                <div class="p-3">

                                    @if($product->main_image)

                                        <img
                                            src="{{ asset($product->main_image) }}"
                                            class="card-img-top rounded-3"
                                            alt="{{ $product->name }}"
                                            style="height: 240px; object-fit: contain; background: #111;">

                                    @else

                                        <img
                                            src="https://placehold.co/500x500/111111/FFFFFF?text=TechHub+Product"
                                            class="card-img-top rounded-3"
                                            alt="{{ $product->name }}"
                                            style="height: 240px; object-fit: contain;">

                                    @endif

                                </div>


                                <!-- Product Information -->

                                <div class="card-body d-flex flex-column">

                                    <h5 class="card-title fw-bold">

                                        {{ $product->name }}

                                    </h5>


                                    @if($product->brand)

                                        <small class="text-secondary mb-2">

                                            {{ $product->brand }}

                                        </small>

                                    @endif


                                    <div class="mb-3">

                                        <span class="text-warning">

                                            ★★★★★

                                        </span>

                                        <small class="text-secondary">

                                            ({{ $product->rating }})

                                        </small>

                                    </div>


                                    <h4 class="text-danger fw-bold mb-4">

                                        ৳ {{ number_format($product->price, 2) }}

                                    </h4>


                                    <!-- Buttons -->

                                    <div class="mt-auto d-flex gap-2">

                                        <a
                                            href="{{ route('products.show', $product->slug) }}"
                                            class="btn btn-danger flex-grow-1">

                                            View Product

                                        </a>


                                        <form
                                            action="{{ route('wishlist.destroy', $product) }}"
                                            method="POST">

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-outline-light"
                                                title="Remove from Wishlist">

                                                ❤️

                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endif

                @endforeach

            </div>

        @else

            <!-- Empty Wishlist -->

            <div class="text-center py-5">

                <div class="mb-4">

                    <span
                        style="font-size: 70px;">

                        ♡

                    </span>

                </div>


                <h2 class="text-white fw-bold mb-3">

                    Your Wishlist is Empty

                </h2>


                <p class="text-secondary mb-4">

                    You haven't added any products to your wishlist yet.

                </p>


                <a
                    href="{{ route('products') }}"
                    class="btn btn-danger px-5">

                    Browse Products

                </a>

            </div>

        @endif

    </div>

</section>

@endsection