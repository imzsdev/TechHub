@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')

    <div class="container-fluid px-0">

        {{-- Page Header --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

            <div>
                <h1 class="h3 text-white fw-bold mb-1">
                    Edit Product
                </h1>

                <p class="text-secondary mb-0">
                    Update product information, pricing, inventory and images.
                </p>
            </div>

            <div>
                <a
                    href="{{ route('admin.products.index') }}"
                    class="btn btn-outline-light"
                >
                    <i class="bi bi-arrow-left me-1"></i>
                    Back to Products
                </a>
            </div>

        </div>


        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger border-0 shadow-sm mb-4">
                <div class="fw-bold mb-2">
                    Please fix the following errors:
                </div>

                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- Edit Product Form --}}
        <form
            action="{{ route('admin.products.update', $product) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')


            {{-- Basic Information --}}
            <div class="card bg-dark border-secondary mb-4">

                <div class="card-header bg-transparent border-secondary">
                    <h5 class="text-white mb-0">
                        Basic Information
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row g-3">

                        {{-- Product Name --}}
                        <div class="col-md-6">

                            <label
                                for="name"
                                class="form-label text-white"
                            >
                                Product Name
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-control bg-dark text-white border-secondary @error('name') is-invalid @enderror"
                                value="{{ old('name', $product->name) }}"
                                required
                            >

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Slug --}}
                        <div class="col-md-6">

                            <label
                                for="slug"
                                class="form-label text-white"
                            >
                                Slug
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                id="slug"
                                name="slug"
                                class="form-control bg-dark text-white border-secondary @error('slug') is-invalid @enderror"
                                value="{{ old('slug', $product->slug) }}"
                                required
                            >

                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- SKU --}}
                        <div class="col-md-6">

                            <label
                                for="sku"
                                class="form-label text-white"
                            >
                                SKU
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                id="sku"
                                name="sku"
                                class="form-control bg-dark text-white border-secondary @error('sku') is-invalid @enderror"
                                value="{{ old('sku', $product->sku) }}"
                                required
                            >

                            @error('sku')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Brand --}}
                        <div class="col-md-3">

                            <label
                                for="brand"
                                class="form-label text-white"
                            >
                                Brand
                            </label>

                            <input
                                type="text"
                                id="brand"
                                name="brand"
                                class="form-control bg-dark text-white border-secondary @error('brand') is-invalid @enderror"
                                value="{{ old('brand', $product->brand) }}"
                            >

                            @error('brand')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Category --}}
                        <div class="col-md-3">

                            <label
                                for="category"
                                class="form-label text-white"
                            >
                                Category
                            </label>

                            <input
                                type="text"
                                id="category"
                                name="category"
                                class="form-control bg-dark text-white border-secondary @error('category') is-invalid @enderror"
                                value="{{ old('category', $product->category) }}"
                            >

                            @error('category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>

            </div>


            {{-- Product Description --}}
            <div class="card bg-dark border-secondary mb-4">

                <div class="card-header bg-transparent border-secondary">
                    <h5 class="text-white mb-0">
                        Product Description
                    </h5>
                </div>

                <div class="card-body">

                    <div class="mb-3">

                        <label
                            for="short_description"
                            class="form-label text-white"
                        >
                            Short Description
                        </label>

                        <textarea
                            id="short_description"
                            name="short_description"
                            rows="3"
                            class="form-control bg-dark text-white border-secondary @error('short_description') is-invalid @enderror"
                        >{{ old('short_description', $product->short_description) }}</textarea>

                        @error('short_description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div>

                        <label
                            for="description"
                            class="form-label text-white"
                        >
                            Full Description
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            class="form-control bg-dark text-white border-secondary @error('description') is-invalid @enderror"
                        >{{ old('description', $product->description) }}</textarea>

                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

            </div>


            {{-- Pricing & Inventory --}}
            <div class="card bg-dark border-secondary mb-4">

                <div class="card-header bg-transparent border-secondary">
                    <h5 class="text-white mb-0">
                        Pricing & Inventory
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row g-3">

                        {{-- Price --}}
                        <div class="col-md-4">

                            <label
                                for="price"
                                class="form-label text-white"
                            >
                                Regular Price
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="number"
                                id="price"
                                name="price"
                                step="0.01"
                                min="0"
                                class="form-control bg-dark text-white border-secondary @error('price') is-invalid @enderror"
                                value="{{ old('price', $product->price) }}"
                                required
                            >

                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Sale Price --}}
                        <div class="col-md-4">

                            <label
                                for="sale_price"
                                class="form-label text-white"
                            >
                                Sale Price
                            </label>

                            <input
                                type="number"
                                id="sale_price"
                                name="sale_price"
                                step="0.01"
                                min="0"
                                class="form-control bg-dark text-white border-secondary @error('sale_price') is-invalid @enderror"
                                value="{{ old('sale_price', $product->sale_price) }}"
                            >

                            @error('sale_price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Stock --}}
                        <div class="col-md-4">

                            <label
                                for="stock"
                                class="form-label text-white"
                            >
                                Stock
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="number"
                                id="stock"
                                name="stock"
                                min="0"
                                class="form-control bg-dark text-white border-secondary @error('stock') is-invalid @enderror"
                                value="{{ old('stock', $product->stock) }}"
                                required
                            >

                            @error('stock')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>

            </div>


            {{-- Product Images --}}
            <div class="card bg-dark border-secondary mb-4">

                <div class="card-header bg-transparent border-secondary">
                    <h5 class="text-white mb-0">
                        Product Images
                    </h5>
                </div>

                <div class="card-body">

                    {{-- Current Main Image --}}
                    <div class="mb-4">

                        <label class="form-label text-white">
                            Current Main Image
                        </label>

                        @if ($product->main_image)

                            <div class="mb-3">

                                <img
                                    src="{{ asset('storage/' . $product->main_image) }}"
                                    alt="{{ $product->name }}"
                                    class="rounded border border-secondary"
                                    style="width: 140px; height: 140px; object-fit: cover;"
                                >

                            </div>

                        @else

                            <div class="text-secondary mb-3">
                                No main image uploaded.
                            </div>

                        @endif

                    </div>


                    {{-- New Main Image --}}
                    <div class="mb-4">

                        <label
                            for="main_image"
                            class="form-label text-white"
                        >
                            Replace Main Image
                        </label>

                        <input
                            type="file"
                            id="main_image"
                            name="main_image"
                            accept=".jpg,.jpeg,.png,.webp"
                            class="form-control bg-dark text-white border-secondary @error('main_image') is-invalid @enderror"
                        >

                        <div class="form-text text-secondary">
                            Leave empty if you want to keep the current image.
                        </div>

                        @error('main_image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <div
                            id="mainImagePreview"
                            class="mt-3"
                        ></div>

                    </div>


                    {{-- Current Gallery --}}
                    <div class="mb-4">

                        <label class="form-label text-white">
                            Current Gallery Images
                        </label>

                        @if (is_array($product->gallery_images) && count($product->gallery_images))

                            <div class="d-flex flex-wrap gap-3">

                                @foreach ($product->gallery_images as $image)

                                    <img
                                        src="{{ asset('storage/' . $image) }}"
                                        alt="{{ $product->name }}"
                                        class="rounded border border-secondary"
                                        style="width: 110px; height: 110px; object-fit: cover;"
                                    >

                                @endforeach

                            </div>

                        @else

                            <div class="text-secondary">
                                No gallery images uploaded.
                            </div>

                        @endif

                    </div>


                    {{-- New Gallery --}}
                    <div>

                        <label
                            for="gallery_images"
                            class="form-label text-white"
                        >
                            Replace Gallery Images
                        </label>

                        <input
                            type="file"
                            id="gallery_images"
                            name="gallery_images[]"
                            accept=".jpg,.jpeg,.png,.webp"
                            class="form-control bg-dark text-white border-secondary @error('gallery_images') is-invalid @enderror"
                            multiple
                        >

                        <div class="form-text text-secondary">
                            Leave empty if you want to keep the current gallery.
                            Uploading new gallery images will replace the existing gallery.
                        </div>

                        @error('gallery_images')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        @error('gallery_images.*')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror

                        <div
                            id="galleryPreview"
                            class="d-flex flex-wrap gap-3 mt-3"
                        ></div>

                    </div>

                </div>

            </div>


            {{-- Product Status --}}
            <div class="card bg-dark border-secondary mb-4">

                <div class="card-header bg-transparent border-secondary">
                    <h5 class="text-white mb-0">
                        Product Status
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row g-3">

                        {{-- Active --}}
                        <div class="col-md-4">

                            <div class="form-check form-switch">

                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="is_active"
                                    name="is_active"
                                    value="1"
                                    @checked(old('is_active', $product->is_active))
                                >

                                <label
                                    class="form-check-label text-white"
                                    for="is_active"
                                >
                                    Active
                                </label>

                            </div>

                        </div>


                        {{-- Featured --}}
                        <div class="col-md-4">

                            <div class="form-check form-switch">

                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="is_featured"
                                    name="is_featured"
                                    value="1"
                                    @checked(old('is_featured', $product->is_featured))
                                >

                                <label
                                    class="form-check-label text-white"
                                    for="is_featured"
                                >
                                    Featured Product
                                </label>

                            </div>

                        </div>


                        {{-- Flash Sale --}}
                        <div class="col-md-4">

                            <div class="form-check form-switch">

                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="is_flash_sale"
                                    name="is_flash_sale"
                                    value="1"
                                    @checked(old('is_flash_sale', $product->is_flash_sale))
                                >

                                <label
                                    class="form-check-label text-white"
                                    for="is_flash_sale"
                                >
                                    Flash Sale
                                </label>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Rating Information --}}
            <div class="card bg-dark border-secondary mb-4">

                <div class="card-header bg-transparent border-secondary">
                    <h5 class="text-white mb-0">
                        Rating Information
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row g-3">

                        {{-- Rating --}}
                        <div class="col-md-6">

                            <label
                                for="rating"
                                class="form-label text-white"
                            >
                                Rating
                            </label>

                            <input
                                type="number"
                                id="rating"
                                name="rating"
                                step="0.1"
                                min="0"
                                max="5"
                                class="form-control bg-dark text-white border-secondary @error('rating') is-invalid @enderror"
                                value="{{ old('rating', $product->rating) }}"
                            >

                            @error('rating')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Review Count --}}
                        <div class="col-md-6">

                            <label
                                for="review_count"
                                class="form-label text-white"
                            >
                                Review Count
                            </label>

                            <input
                                type="number"
                                id="review_count"
                                name="review_count"
                                min="0"
                                class="form-control bg-dark text-white border-secondary @error('review_count') is-invalid @enderror"
                                value="{{ old('review_count', $product->review_count) }}"
                            >

                            @error('review_count')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>

            </div>


            {{-- Form Actions --}}
            <div class="d-flex flex-column flex-sm-row justify-content-end gap-2 mb-5">

                <a
                    href="{{ route('admin.products.index') }}"
                    class="btn btn-outline-light"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="btn btn-danger"
                >
                    <i class="bi bi-check-lg me-1"></i>
                    Update Product
                </button>

            </div>

        </form>

    </div>


    {{-- Image Preview Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const mainImageInput = document.getElementById('main_image');
            const mainImagePreview = document.getElementById('mainImagePreview');

            if (mainImageInput && mainImagePreview) {

                mainImageInput.addEventListener('change', function () {

                    mainImagePreview.innerHTML = '';

                    const file = this.files[0];

                    if (!file) {
                        return;
                    }

                    const reader = new FileReader();

                    reader.onload = function (event) {

                        const wrapper = document.createElement('div');

                        wrapper.innerHTML = `
                            <div class="small text-secondary mb-2">
                                New Main Image Preview
                            </div>

                            <img
                                src="${event.target.result}"
                                alt="New Main Image"
                                class="rounded border border-secondary"
                                style="width: 140px; height: 140px; object-fit: cover;"
                            >
                        `;

                        mainImagePreview.appendChild(wrapper);
                    };

                    reader.readAsDataURL(file);
                });
            }


            const galleryInput = document.getElementById('gallery_images');
            const galleryPreview = document.getElementById('galleryPreview');

            if (galleryInput && galleryPreview) {

                galleryInput.addEventListener('change', function () {

                    galleryPreview.innerHTML = '';

                    Array.from(this.files).forEach(function (file) {

                        const reader = new FileReader();

                        reader.onload = function (event) {

                            const image = document.createElement('img');

                            image.src = event.target.result;
                            image.alt = 'Gallery Preview';

                            image.className = 'rounded border border-secondary';

                            image.style.width = '110px';
                            image.style.height = '110px';
                            image.style.objectFit = 'cover';

                            galleryPreview.appendChild(image);
                        };

                        reader.readAsDataURL(file);
                    });

                });

            }

        });
    </script>

@endsection