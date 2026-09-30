@extends('layouts.admin')

@section('title', 'Products')

@section('content')

<div class="container-fluid py-4">

    {{-- =========================================================
         Page Header
    ========================================================== --}}

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>

            <h1 class="h3 text-white fw-bold mb-1">
                Products
            </h1>

            <p class="text-secondary mb-0">
                Manage your TechHub products, stock and product status.
            </p>

        </div>


        <div>

            <a
                href="{{ route('admin.products.create') }}"
                class="btn btn-danger">

                <i class="bi bi-plus-lg me-1"></i>

                Add Product

            </a>

        </div>

    </div>


    {{-- =========================================================
         Success Message
    ========================================================== --}}

    @if(session('success'))

        <div
            class="alert alert-success alert-dismissible fade show"
            role="alert">

            <i class="bi bi-check-circle me-1"></i>

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- =========================================================
         Product Card
    ========================================================== --}}

    <div class="card bg-dark border-secondary shadow-sm">

        {{-- Card Header --}}

        <div class="card-header bg-dark border-secondary">

            <div class="row align-items-center g-3">

                {{-- Title --}}

                <div class="col-lg-4">

                    <h5 class="text-white mb-0">

                        All Products

                    </h5>

                    <small class="text-secondary">

                        {{ $products->total() }} total products

                    </small>

                </div>


                {{-- Search --}}

                <div class="col-lg-5">

                    <form
                        action="{{ route('admin.products.index') }}"
                        method="GET">

                        <div class="input-group">

                            <span class="input-group-text bg-secondary border-secondary text-white">

                                <i class="bi bi-search"></i>

                            </span>

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                class="form-control bg-dark text-white border-secondary"
                                placeholder="Search products...">

                            <button
                                type="submit"
                                class="btn btn-outline-light">

                                Search

                            </button>

                        </div>

                    </form>

                </div>


                {{-- Reset --}}

                <div class="col-lg-3 text-lg-end">

                    @if(request('search'))

                        <a
                            href="{{ route('admin.products.index') }}"
                            class="btn btn-outline-secondary">

                            <i class="bi bi-arrow-clockwise me-1"></i>

                            Reset

                        </a>

                    @endif

                </div>

            </div>

        </div>


        {{-- =====================================================
             Table
        ====================================================== --}}

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-dark table-hover align-middle mb-0">

                    <thead>

                        <tr>

                            <th class="px-4 py-3">
                                Product
                            </th>

                            <th class="py-3">
                                SKU
                            </th>

                            <th class="py-3">
                                Category
                            </th>

                            <th class="py-3">
                                Price
                            </th>

                            <th class="py-3">
                                Stock
                            </th>

                            <th class="py-3">
                                Status
                            </th>

                            <th class="py-3 text-end px-4">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($products as $product)

                            <tr>

                                {{-- =================================================
                                     Product
                                ================================================== --}}

                                <td class="px-4">

                                    <div class="d-flex align-items-center gap-3">


                                        {{-- Image --}}

                                        <div
                                            class="rounded overflow-hidden flex-shrink-0"
                                            style="width: 60px; height: 60px;">

                                            @if($product->main_image)

                                                <img
                                                    src="{{ asset('storage/' . $product->main_image) }}"
                                                    alt="{{ $product->name }}"
                                                    class="w-100 h-100"
                                                    style="object-fit: cover;">

                                            @else

                                                <div
                                                    class="w-100 h-100 bg-secondary d-flex align-items-center justify-content-center">

                                                    <i class="bi bi-image text-white fs-4"></i>

                                                </div>

                                            @endif

                                        </div>


                                        {{-- Name --}}

                                        <div>

                                            <div class="text-white fw-semibold">

                                                {{ $product->name }}

                                            </div>


                                            <small class="text-secondary">

                                                {{ $product->brand ?: 'No brand' }}

                                            </small>

                                        </div>

                                    </div>

                                </td>


                                {{-- =================================================
                                     SKU
                                ================================================== --}}

                                <td>

                                    <span class="text-secondary">

                                        {{ $product->sku }}

                                    </span>

                                </td>


                                {{-- =================================================
                                     Category
                                ================================================== --}}

                                <td>

                                    <span class="text-secondary">

                                        {{ $product->category ?: 'Uncategorized' }}

                                    </span>

                                </td>


                                {{-- =================================================
                                     Price
                                ================================================== --}}

                                <td>

                                    @if($product->sale_price)

                                        <div class="text-danger fw-bold">

                                            ৳ {{ number_format($product->sale_price, 2) }}

                                        </div>

                                        <small class="text-secondary text-decoration-line-through">

                                            ৳ {{ number_format($product->price, 2) }}

                                        </small>

                                    @else

                                        <span class="text-white fw-semibold">

                                            ৳ {{ number_format($product->price, 2) }}

                                        </span>

                                    @endif

                                </td>


                                {{-- =================================================
                                     Stock
                                ================================================== --}}

                                <td>

                                    @if($product->stock > 10)

                                        <span class="badge bg-success">

                                            {{ $product->stock }} in stock

                                        </span>

                                    @elseif($product->stock > 0)

                                        <span class="badge bg-warning text-dark">

                                            {{ $product->stock }} left

                                        </span>

                                    @else

                                        <span class="badge bg-danger">

                                            Out of stock

                                        </span>

                                    @endif

                                </td>


                                {{-- =================================================
                                     Status
                                ================================================== --}}

                                <td>

                                    @if($product->is_active)

                                        <span class="badge bg-success">

                                            Active

                                        </span>

                                    @else

                                        <span class="badge bg-secondary">

                                            Inactive

                                        </span>

                                    @endif


                                    @if($product->is_featured)

                                        <span class="badge bg-warning text-dark ms-1">

                                            Featured

                                        </span>

                                    @endif


                                    @if($product->is_flash_sale)

                                        <span class="badge bg-danger ms-1">

                                            Flash Sale

                                        </span>

                                    @endif

                                </td>


                                {{-- =================================================
                                     Actions
                                ================================================== --}}

                                <td class="text-end px-4">

                                    <div class="d-inline-flex gap-2">


                                        {{-- Edit --}}

                                        <a
                                            href="{{ route('admin.products.edit', $product) }}"
                                            class="btn btn-sm btn-outline-light"
                                            title="Edit Product">

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        {{-- Delete --}}

                                        <form
                                            action="{{ route('admin.products.destroy', $product) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this product?');">

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                title="Delete Product">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            {{-- =================================================
                                 Empty State
                            ================================================== --}}

                            <tr>

                                <td
                                    colspan="7"
                                    class="text-center py-5">

                                    <div class="text-secondary">

                                        <i
                                            class="bi bi-box-seam fs-1 d-block mb-3">
                                        </i>

                                        <h5 class="text-white">

                                            No Products Found

                                        </h5>

                                        <p class="mb-3">

                                            There are no products matching your search.

                                        </p>

                                        <a
                                            href="{{ route('admin.products.create') }}"
                                            class="btn btn-danger">

                                            <i class="bi bi-plus-lg me-1"></i>

                                            Add Your First Product

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- =====================================================
             Pagination
        ====================================================== --}}

        @if($products->hasPages())

            <div class="card-footer bg-dark border-secondary">

                <div class="d-flex justify-content-center">

                    {{ $products->withQueryString()->links() }}

                </div>

            </div>

        @endif

    </div>

</div>

@endsection