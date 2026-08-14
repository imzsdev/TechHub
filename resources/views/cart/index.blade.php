@extends('layouts.app')

@section('content')

<section class="products-page py-5">

    <div class="container">

        <div class="mb-5">

            <h1 class="text-white fw-bold">
                Shopping Cart
            </h1>

            <p class="text-secondary">
                Review your selected products before checkout.
            </p>

        </div>

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif

        @if(count($cart))

            @php
                $grandTotal = 0;
            @endphp

            <div class="table-responsive">

                <table class="table table-dark align-middle">

                    <thead>

                        <tr>

                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th width="220">Quantity</th>
                            <th>Total</th>
                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($cart as $item)

                            @php
                                $total = $item['price'] * $item['quantity'];
                                $grandTotal += $total;
                            @endphp

                            <tr>

                                <td width="120">

                                    <img
                                        src="{{ asset($item['image']) }}"
                                        class="img-fluid rounded"
                                        style="max-height:80px;object-fit:contain;">

                                </td>

                                <td>

                                    <strong>

                                        {{ $item['name'] }}

                                    </strong>

                                </td>

                                <td>

                                    ৳ {{ number_format($item['price'],2) }}

                                </td>

                                <td>

                                    <div class="d-flex align-items-center gap-2">

                                        <a
                                            href="{{ route('cart.decrease',$item['id']) }}"
                                            class="btn btn-sm btn-outline-light">

                                            −

                                        </a>

                                        <span class="px-3">

                                            {{ $item['quantity'] }}

                                        </span>

                                        <a
                                            href="{{ route('cart.increase',$item['id']) }}"
                                            class="btn btn-sm btn-outline-light">

                                            +

                                        </a>

                                    </div>

                                </td>

                                <td>

                                    ৳ {{ number_format($total,2) }}

                                </td>

                                <td>

                                    <a
                                        href="{{ route('cart.remove',$item['id']) }}"
                                        class="btn btn-danger btn-sm">

                                        Remove

                                    </a>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                    <tfoot>

                        <tr>

                            <th colspan="4" class="text-end">

                                Grand Total

                            </th>

                            <th class="text-danger">

                                ৳ {{ number_format($grandTotal,2) }}

                            </th>

                            <th></th>

                        </tr>

                    </tfoot>

                </table>

            </div>

            <div class="d-flex justify-content-end mt-4">

                <a
                    href="{{ route('checkout.index') }}"
                    class="btn-techhub text-decoration-none">

                    Proceed to Checkout

                </a>

            </div>

        @else

            <div class="card bg-dark border-secondary">

                <div class="card-body text-center py-5">

                    <h3 class="text-white">

                        🛒 Your Cart is Empty

                    </h3>

                    <p class="text-secondary mt-3">

                        Browse our products and add your favorite items.

                    </p>

                    <a
                        href="{{ route('products') }}"
                        class="btn-techhub text-decoration-none mt-3">

                        Continue Shopping

                    </a>

                </div>

            </div>

        @endif

    </div>

</section>

@endsection