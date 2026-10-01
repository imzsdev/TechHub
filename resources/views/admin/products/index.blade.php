@extends('layouts.admin')

@section('title', 'Products')

@section('content')

<div class="container-fluid py-4">

    {{-- Page Header --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>
            <h1 class="text-white fw-bold mb-1">
                Products
            </h1>

            <p class="text-secondary mb-0">
                Manage your TechHub products.
            </p>
        </div>

        <a
            href="{{ route('admin.products.create') }}"
            class="btn btn-danger"
        >
            <i class="bi bi-plus-lg me-1"></i>
            Add Product
        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>

        </div>
    @endif


    {{-- Products Card --}}
    <div class="card bg-dark border-secondary shadow-sm">

        {{-- Card Header --}}
        <div class="card-header bg-dark border-secondary py-3">

            <div class="d-flex flex-column flex-xl-row justify-content-between align-items-xl-center gap-3">

                <div>
                    <h5 class="text-white mb-1">
                        Product List
                    </h5>

                    <small class="text-secondary">
                        {{ $products->total() }} product{{ $products->total() === 1 ? '' : 's' }}
                    </small>
                </div>

            </div>

        </div>


        {{-- Filters --}}
        <div class="card-body border-bottom border-secondary">

            <div class="row g-3">

                {{-- Search --}}
                <div class="col-12 col-xl-5">

                    <form
                        action="{{ route('admin.products.index') }}"
                        method="GET"
                    >

                        {{-- Preserve Status --}}
                        <input
                            type="hidden"
                            name="status"
                            value="{{ request('status', 'all') }}"
                        >

                        {{-- Preserve Sort --}}
                        <input
                            type="hidden"
                            name="sort"
                            value="{{ request('sort', 'newest') }}"
                        >

                        <label
                            for="productSearch"
                            class="form-label text-secondary"
                        >
                            Search Products
                        </label>

                        <div class="input-group">

                            <input
                                type="text"
                                id="productSearch"
                                name="search"
                                value="{{ request('search') }}"
                                class="form-control bg-dark text-white border-secondary"
                                placeholder="Search by name, SKU, brand or category..."
                            >

                            <button
                                type="submit"
                                class="btn btn-danger"
                            >
                                <i class="bi bi-search me-1"></i>
                                Search
                            </button>

                        </div>

                    </form>

                </div>


                {{-- Status Filter --}}
                <div class="col-12 col-md-6 col-xl-3">

                    <form
                        action="{{ route('admin.products.index') }}"
                        method="GET"
                    >

                        {{-- Preserve Search --}}
                        <input
                            type="hidden"
                            name="search"
                            value="{{ request('search') }}"
                        >

                        {{-- Preserve Sort --}}
                        <input
                            type="hidden"
                            name="sort"
                            value="{{ request('sort', 'newest') }}"
                        >

                        <label
                            for="statusFilter"
                            class="form-label text-secondary"
                        >
                            Status
                        </label>

                        <select
                            id="statusFilter"
                            name="status"
                            class="form-select bg-dark text-white border-secondary"
                            onchange="this.form.submit()"
                        >

                            <option
                                value="all"
                                {{ request('status', 'all') === 'all' ? 'selected' : '' }}
                            >
                                All Products
                            </option>

                            <option
                                value="active"
                                {{ request('status') === 'active' ? 'selected' : '' }}
                            >
                                Active
                            </option>

                            <option
                                value="inactive"
                                {{ request('status') === 'inactive' ? 'selected' : '' }}
                            >
                                Inactive
                            </option>

                            <option
                                value="featured"
                                {{ request('status') === 'featured' ? 'selected' : '' }}
                            >
                                Featured
                            </option>

                            <option
                                value="flash_sale"
                                {{ request('status') === 'flash_sale' ? 'selected' : '' }}
                            >
                                Flash Sale
                            </option>

                            <option
                                value="out_of_stock"
                                {{ request('status') === 'out_of_stock' ? 'selected' : '' }}
                            >
                                Out of Stock
                            </option>

                        </select>

                    </form>

                </div>


                {{-- Sort --}}
                <div class="col-12 col-md-6 col-xl-3">

                    <form
                        action="{{ route('admin.products.index') }}"
                        method="GET"
                    >

                        {{-- Preserve Search --}}
                        <input
                            type="hidden"
                            name="search"
                            value="{{ request('search') }}"
                        >

                        {{-- Preserve Status --}}
                        <input
                            type="hidden"
                            name="status"
                            value="{{ request('status', 'all') }}"
                        >

                        <label
                            for="sortProducts"
                            class="form-label text-secondary"
                        >
                            Sort By
                        </label>

                        <select
                            id="sortProducts"
                            name="sort"
                            class="form-select bg-dark text-white border-secondary"
                            onchange="this.form.submit()"
                        >

                            <option
                                value="newest"
                                {{ request('sort', 'newest') === 'newest' ? 'selected' : '' }}
                            >
                                Newest First
                            </option>

                            <option
                                value="oldest"
                                {{ request('sort') === 'oldest' ? 'selected' : '' }}
                            >
                                Oldest First
                            </option>

                            <option
                                value="name_asc"
                                {{ request('sort') === 'name_asc' ? 'selected' : '' }}
                            >
                                Name: A → Z
                            </option>

                            <option
                                value="name_desc"
                                {{ request('sort') === 'name_desc' ? 'selected' : '' }}
                            >
                                Name: Z → A
                            </option>

                            <option
                                value="price_asc"
                                {{ request('sort') === 'price_asc' ? 'selected' : '' }}
                            >
                                Price: Low → High
                            </option>

                            <option
                                value="price_desc"
                                {{ request('sort') === 'price_desc' ? 'selected' : '' }}
                            >
                                Price: High → Low
                            </option>

                            <option
                                value="stock_asc"
                                {{ request('sort') === 'stock_asc' ? 'selected' : '' }}
                            >
                                Stock: Low → High
                            </option>

                            <option
                                value="stock_desc"
                                {{ request('sort') === 'stock_desc' ? 'selected' : '' }}
                            >
                                Stock: High → Low
                            </option>

                        </select>

                    </form>

                </div>


                {{-- Reset --}}
                <div class="col-12 col-xl-1 d-flex align-items-end">

                    @if(
                        request('search') ||
                        (request('sort') && request('sort') !== 'newest') ||
                        (request('status') && request('status') !== 'all')
                    )

                        <a
                            href="{{ route('admin.products.index') }}"
                            class="btn btn-outline-light w-100"
                        >
                            Reset
                        </a>

                    @endif

                </div>

            </div>

        </div>


        {{-- Product Table --}}
        <div class="card-body p-0">

            @if($products->count())

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

                            @foreach($products as $product)

                                <tr>

                                    {{-- Product --}}
                                    <td class="px-4">

                                        <div class="d-flex align-items-center gap-3">

                                            @if($product->main_image)

                                                <img
                                                    src="{{ asset('storage/' . $product->main_image) }}"
                                                    alt="{{ $product->name }}"
                                                    width="55"
                                                    height="55"
                                                    class="rounded object-fit-cover border border-secondary"
                                                >

                                            @else

                                                <div
                                                    class="rounded bg-secondary d-flex align-items-center justify-content-center"
                                                    style="width: 55px; height: 55px;"
                                                >
                                                    <i class="bi bi-image text-light"></i>
                                                </div>

                                            @endif


                                            <div>

                                                <div class="fw-semibold text-white">
                                                    {{ $product->name }}
                                                </div>

                                                @if($product->brand)

                                                    <small class="text-secondary">
                                                        {{ $product->brand }}
                                                    </small>

                                                @endif

                                            </div>

                                        </div>

                                    </td>


                                    {{-- SKU --}}
                                    <td>
                                        <span class="text-light">
                                            {{ $product->sku }}
                                        </span>
                                    </td>


                                    {{-- Category --}}
                                    <td>

                                        @if($product->category)

                                            <span class="text-light">
                                                {{ $product->category }}
                                            </span>

                                        @else

                                            <span class="text-secondary">
                                                —
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Price --}}
                                    <td>

                                        @if($product->sale_price !== null)

                                            <div class="fw-semibold text-danger">
                                                ৳{{ number_format($product->sale_price, 2) }}
                                            </div>

                                            <small class="text-secondary text-decoration-line-through">
                                                ৳{{ number_format($product->price, 2) }}
                                            </small>

                                        @else

                                            <span class="fw-semibold text-white">
                                                ৳{{ number_format($product->price, 2) }}
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Stock --}}
                                    <td>

                                        @if($product->stock <= 0)

                                            <span class="badge bg-danger">
                                                Out of Stock
                                            </span>

                                        @elseif($product->stock <= 5)

                                            <span class="badge bg-warning text-dark">
                                                {{ $product->stock }} left
                                            </span>

                                        @else

                                            <span class="text-light">
                                                {{ $product->stock }}
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Status --}}
                                    <td>

                                        <div class="d-flex flex-wrap gap-1">

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

                                                <span class="badge bg-primary">
                                                    Featured
                                                </span>

                                            @endif


                                            @if($product->is_flash_sale)

                                                <span class="badge bg-danger">
                                                    Flash Sale
                                                </span>

                                            @endif

                                        </div>

                                    </td>


                                    {{-- Actions --}}
                                    <td class="text-end px-4">

                                        <div class="d-flex justify-content-end gap-2">

                                            <a
                                                href="{{ route('admin.products.edit', $product) }}"
                                                class="btn btn-sm btn-outline-light"
                                                title="Edit Product"
                                            >
                                                <i class="bi bi-pencil"></i>
                                            </a>


                                            <form
                                                action="{{ route('admin.products.destroy', $product) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this product?');"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                    title="Delete Product"
                                                >
                                                    <i class="bi bi-trash"></i>
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                {{-- Empty State --}}
                <div class="text-center py-5 px-4">

                    <div class="mb-3">
                        <i class="bi bi-box-seam display-4 text-secondary"></i>
                    </div>

                    <h5 class="text-white">
                        No products found
                    </h5>

                    <p class="text-secondary mb-4">
                        No products match your current search or filter.
                    </p>

                    <a
                        href="{{ route('admin.products.index') }}"
                        class="btn btn-outline-light"
                    >
                        Clear Filters
                    </a>

                </div>

            @endif

        </div>


        {{-- Pagination --}}
        @if($products->hasPages())

            <div class="card-footer bg-dark border-secondary py-3">

                {{ $products->withQueryString()->links() }}

            </div>

        @endif

    </div>

</div>

@endsection