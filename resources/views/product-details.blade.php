@extends('layouts.app')

@section('content')

<section class="product-details-page py-5">

    <div class="container">

        <div class="row align-items-center g-5">

            <!-- Product Image -->

            <div class="col-lg-6">

                <img
                    src="https://placehold.co/700x700/111111/FFFFFF?text=TechHub+Product"
                    class="img-fluid rounded-4"
                    alt="Product">

            </div>

            <!-- Product Info -->

            <div class="col-lg-6">

                <span class="badge bg-danger mb-3">
                    New Arrival
                </span>

                <h1 class="text-white fw-bold">
                    Gaming Headphones
                </h1>

                <p class="text-warning fs-5">
                    ★★★★★ (4.9 Reviews)
                </p>

                <h2 class="text-danger fw-bold mb-4">
                    ৳ 5,999
                </h2>

                <p class="text-secondary">
                    Premium wireless gaming headphones with RGB lighting,
                    crystal clear microphone and immersive surround sound.
                </p>

                <div class="d-flex gap-3 mt-4">

                    <button class="btn-techhub px-5">
                        Add to Cart
                    </button>

                    <button class="btn btn-outline-light px-4">
                        ❤️ Wishlist
                    </button>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection