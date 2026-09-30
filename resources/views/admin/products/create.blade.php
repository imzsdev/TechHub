@extends('layouts.admin')

@section('title', 'Add Product')

@section('content')

<div class="container-fluid py-4">

    <!-- ========================================= -->
    <!-- PAGE HEADER -->
    <!-- ========================================= -->

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>

            <div class="d-flex align-items-center gap-2 mb-2">

                <a
                    href="{{ route('admin.products.index') }}"
                    class="text-secondary text-decoration-none">

                    <i class="bi bi-arrow-left"></i>

                    Products

                </a>

                <span class="text-secondary">
                    /
                </span>

                <span class="text-white">
                    Add Product
                </span>

            </div>

            <h1 class="h3 text-white fw-bold mb-1">
                Add Product
            </h1>

            <p class="text-secondary mb-0">
                Create a new product for your TechHub store.
            </p>

        </div>


        <div>

            <a
                href="{{ route('admin.products.index') }}"
                class="btn btn-outline-light">

                <i class="bi bi-arrow-left me-1"></i>

                Back to Products

            </a>

        </div>

    </div>


    <!-- ========================================= -->
    <!-- VALIDATION ERRORS -->
    <!-- ========================================= -->

    @if($errors->any())

        <div
            class="alert alert-danger border-danger"
            role="alert">

            <div class="d-flex align-items-start gap-2">

                <i class="bi bi-exclamation-triangle-fill fs-5"></i>

                <div>

                    <strong>
                        Please fix the following errors:
                    </strong>

                    <ul class="mb-0 mt-2">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

    @endif


    <!-- ========================================= -->
    <!-- PRODUCT FORM -->
    <!-- ========================================= -->

    <form
        action="{{ route('admin.products.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf


        <div class="row g-4">


            <!-- ===================================== -->
            <!-- LEFT COLUMN -->
            <!-- ===================================== -->

            <div class="col-xl-8">


                <!-- ================================= -->
                <!-- BASIC INFORMATION -->
                <!-- ================================= -->

                <div class="card bg-dark border-secondary shadow-sm mb-4">

                    <div class="card-header bg-dark border-secondary">

                        <h5 class="text-white mb-1">
                            <i class="bi bi-info-circle me-2 text-danger"></i>
                            Basic Information
                        </h5>

                        <small class="text-secondary">
                            Enter the basic details of your product.
                        </small>

                    </div>


                    <div class="card-body">


                        <!-- Product Name -->

                        <div class="mb-4">

                            <label
                                for="name"
                                class="form-label text-white fw-semibold">

                                Product Name
                                <span class="text-danger">*</span>

                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                class="form-control bg-dark text-white border-secondary @error('name') is-invalid @enderror"
                                placeholder="e.g. Gaming Laptop">

                            @error('name')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <div class="row g-3">


                            <!-- Slug -->

                            <div class="col-md-6">

                                <label
                                    for="slug"
                                    class="form-label text-white fw-semibold">

                                    Slug
                                    <span class="text-danger">*</span>

                                </label>

                                <input
                                    type="text"
                                    id="slug"
                                    name="slug"
                                    value="{{ old('slug') }}"
                                    class="form-control bg-dark text-white border-secondary @error('slug') is-invalid @enderror"
                                    placeholder="gaming-laptop">

                                <div class="form-text text-secondary">
                                    Use lowercase letters, numbers and hyphens.
                                </div>

                                @error('slug')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            <!-- SKU -->

                            <div class="col-md-6">

                                <label
                                    for="sku"
                                    class="form-label text-white fw-semibold">

                                    SKU
                                    <span class="text-danger">*</span>

                                </label>

                                <input
                                    type="text"
                                    id="sku"
                                    name="sku"
                                    value="{{ old('sku') }}"
                                    class="form-control bg-dark text-white border-secondary @error('sku') is-invalid @enderror"
                                    placeholder="TH-LP-002">

                                @error('sku')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            <!-- Brand -->

                            <div class="col-md-6">

                                <label
                                    for="brand"
                                    class="form-label text-white fw-semibold">

                                    Brand

                                </label>

                                <input
                                    type="text"
                                    id="brand"
                                    name="brand"
                                    value="{{ old('brand') }}"
                                    class="form-control bg-dark text-white border-secondary @error('brand') is-invalid @enderror"
                                    placeholder="e.g. ASUS">

                                @error('brand')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            <!-- Category -->

                            <div class="col-md-6">

                                <label
                                    for="category"
                                    class="form-label text-white fw-semibold">

                                    Category

                                </label>

                                <input
                                    type="text"
                                    id="category"
                                    name="category"
                                    value="{{ old('category') }}"
                                    class="form-control bg-dark text-white border-secondary @error('category') is-invalid @enderror"
                                    placeholder="e.g. Laptop">

                                @error('category')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                        </div>

                    </div>

                </div>


                <!-- ================================= -->
                <!-- DESCRIPTION -->
                <!-- ================================= -->

                <div class="card bg-dark border-secondary shadow-sm mb-4">

                    <div class="card-header bg-dark border-secondary">

                        <h5 class="text-white mb-1">

                            <i class="bi bi-card-text me-2 text-danger"></i>

                            Product Description

                        </h5>

                        <small class="text-secondary">
                            Add short and detailed product descriptions.
                        </small>

                    </div>


                    <div class="card-body">


                        <!-- Short Description -->

                        <div class="mb-4">

                            <label
                                for="short_description"
                                class="form-label text-white fw-semibold">

                                Short Description

                            </label>

                            <textarea
                                id="short_description"
                                name="short_description"
                                rows="3"
                                class="form-control bg-dark text-white border-secondary @error('short_description') is-invalid @enderror"
                                placeholder="A short summary of the product...">{{ old('short_description') }}</textarea>

                            @error('short_description')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <!-- Full Description -->

                        <div>

                            <label
                                for="description"
                                class="form-label text-white fw-semibold">

                                Full Description

                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="8"
                                class="form-control bg-dark text-white border-secondary @error('description') is-invalid @enderror"
                                placeholder="Write the complete product description...">{{ old('description') }}</textarea>

                            @error('description')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                </div>


                <!-- ================================= -->
                <!-- PRICING & INVENTORY -->
                <!-- ================================= -->

                <div class="card bg-dark border-secondary shadow-sm mb-4">

                    <div class="card-header bg-dark border-secondary">

                        <h5 class="text-white mb-1">

                            <i class="bi bi-cash-stack me-2 text-danger"></i>

                            Pricing & Inventory

                        </h5>

                        <small class="text-secondary">
                            Set product pricing and stock information.
                        </small>

                    </div>


                    <div class="card-body">


                        <div class="row g-3">


                            <!-- Price -->

                            <div class="col-md-4">

                                <label
                                    for="price"
                                    class="form-label text-white fw-semibold">

                                    Regular Price
                                    <span class="text-danger">*</span>

                                </label>

                                <div class="input-group">

                                    <span class="input-group-text bg-secondary text-white border-secondary">
                                        ৳
                                    </span>

                                    <input
                                        type="number"
                                        id="price"
                                        name="price"
                                        value="{{ old('price') }}"
                                        step="0.01"
                                        min="0"
                                        class="form-control bg-dark text-white border-secondary @error('price') is-invalid @enderror"
                                        placeholder="0.00">

                                </div>

                                @error('price')

                                    <div class="text-danger small mt-1">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            <!-- Sale Price -->

                            <div class="col-md-4">

                                <label
                                    for="sale_price"
                                    class="form-label text-white fw-semibold">

                                    Sale Price

                                </label>

                                <div class="input-group">

                                    <span class="input-group-text bg-secondary text-white border-secondary">
                                        ৳
                                    </span>

                                    <input
                                        type="number"
                                        id="sale_price"
                                        name="sale_price"
                                        value="{{ old('sale_price') }}"
                                        step="0.01"
                                        min="0"
                                        class="form-control bg-dark text-white border-secondary @error('sale_price') is-invalid @enderror"
                                        placeholder="0.00">

                                </div>

                                <div class="form-text text-secondary">
                                    Must be equal to or lower than regular price.
                                </div>

                                @error('sale_price')

                                    <div class="text-danger small mt-1">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            <!-- Stock -->

                            <div class="col-md-4">

                                <label
                                    for="stock"
                                    class="form-label text-white fw-semibold">

                                    Stock
                                    <span class="text-danger">*</span>

                                </label>

                                <input
                                    type="number"
                                    id="stock"
                                    name="stock"
                                    value="{{ old('stock', 0) }}"
                                    min="0"
                                    class="form-control bg-dark text-white border-secondary @error('stock') is-invalid @enderror"
                                    placeholder="0">

                                @error('stock')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                        </div>

                    </div>

                </div>


                <!-- ================================= -->
                <!-- PRODUCT IMAGES -->
                <!-- ================================= -->

                <div class="card bg-dark border-secondary shadow-sm mb-4">

                    <div class="card-header bg-dark border-secondary">

                        <h5 class="text-white mb-1">

                            <i class="bi bi-images me-2 text-danger"></i>

                            Product Images

                        </h5>

                        <small class="text-secondary">
                            Upload the main product image and gallery images.
                        </small>

                    </div>


                    <div class="card-body">


                        <!-- Main Image -->

                        <div class="mb-4">

                            <label
                                for="main_image"
                                class="form-label text-white fw-semibold">

                                Main Product Image

                            </label>

                            <input
                                type="file"
                                id="main_image"
                                name="main_image"
                                accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                                class="form-control bg-dark text-white border-secondary @error('main_image') is-invalid @enderror">

                            <div class="form-text text-secondary">
                                JPG, JPEG, PNG or WEBP. Maximum 2MB.
                            </div>

                            @error('main_image')

                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>

                            @enderror

                            <div
                                id="main-image-preview"
                                class="mt-3 d-none">

                                <img
                                    src=""
                                    alt="Main image preview"
                                    class="rounded border border-secondary"
                                    style="width: 160px; height: 160px; object-fit: cover;">

                            </div>

                        </div>


                        <!-- Gallery Images -->

                        <div>

                            <label
                                for="gallery_images"
                                class="form-label text-white fw-semibold">

                                Gallery Images

                            </label>

                            <input
                                type="file"
                                id="gallery_images"
                                name="gallery_images[]"
                                multiple
                                accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                                class="form-control bg-dark text-white border-secondary @error('gallery_images') is-invalid @enderror">

                            <div class="form-text text-secondary">
                                You can select multiple images. Maximum 2MB per image.
                            </div>

                            @error('gallery_images')

                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>

                            @enderror

                            @error('gallery_images.*')

                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>

                            @enderror


                            <div
                                id="gallery-preview"
                                class="row g-3 mt-2">
                            </div>

                        </div>

                    </div>

                </div>


            </div>


            <!-- ===================================== -->
            <!-- RIGHT COLUMN -->
            <!-- ===================================== -->

            <div class="col-xl-4">


                <!-- ================================= -->
                <!-- PUBLISH SETTINGS -->
                <!-- ================================= -->

                <div class="card bg-dark border-secondary shadow-sm mb-4">

                    <div class="card-header bg-dark border-secondary">

                        <h5 class="text-white mb-1">

                            <i class="bi bi-toggle-on me-2 text-danger"></i>

                            Product Status

                        </h5>

                        <small class="text-secondary">
                            Control product visibility and promotions.
                        </small>

                    </div>


                    <div class="card-body">


                        <!-- Active -->

                        <div class="form-check form-switch mb-4">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                role="switch"
                                id="is_active"
                                name="is_active"
                                value="1"
                                {{ old('is_active', true) ? 'checked' : '' }}>

                            <label
                                class="form-check-label text-white fw-semibold"
                                for="is_active">

                                Active Product

                            </label>

                            <div class="text-secondary small mt-1">
                                Active products are visible in the store.
                            </div>

                        </div>


                        <!-- Featured -->

                        <div class="form-check form-switch mb-4">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                role="switch"
                                id="is_featured"
                                name="is_featured"
                                value="1"
                                {{ old('is_featured') ? 'checked' : '' }}>

                            <label
                                class="form-check-label text-white fw-semibold"
                                for="is_featured">

                                Featured Product

                            </label>

                            <div class="text-secondary small mt-1">
                                Show this product in featured sections.
                            </div>

                        </div>


                        <!-- Flash Sale -->

                        <div class="form-check form-switch">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                role="switch"
                                id="is_flash_sale"
                                name="is_flash_sale"
                                value="1"
                                {{ old('is_flash_sale') ? 'checked' : '' }}>

                            <label
                                class="form-check-label text-white fw-semibold"
                                for="is_flash_sale">

                                Flash Sale

                            </label>

                            <div class="text-secondary small mt-1">
                                Mark this product as a flash-sale item.
                            </div>

                        </div>

                    </div>

                </div>


                <!-- ================================= -->
                <!-- RATING -->
                <!-- ================================= -->

                <div class="card bg-dark border-secondary shadow-sm mb-4">

                    <div class="card-header bg-dark border-secondary">

                        <h5 class="text-white mb-1">

                            <i class="bi bi-star-fill me-2 text-warning"></i>

                            Rating Information

                        </h5>

                        <small class="text-secondary">
                            Optional product rating information.
                        </small>

                    </div>


                    <div class="card-body">


                        <!-- Rating -->

                        <div class="mb-3">

                            <label
                                for="rating"
                                class="form-label text-white fw-semibold">

                                Rating

                            </label>

                            <input
                                type="number"
                                id="rating"
                                name="rating"
                                value="{{ old('rating', 0) }}"
                                step="0.1"
                                min="0"
                                max="5"
                                class="form-control bg-dark text-white border-secondary @error('rating') is-invalid @enderror"
                                placeholder="0.0">

                            @error('rating')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <!-- Review Count -->

                        <div>

                            <label
                                for="review_count"
                                class="form-label text-white fw-semibold">

                                Review Count

                            </label>

                            <input
                                type="number"
                                id="review_count"
                                name="review_count"
                                value="{{ old('review_count', 0) }}"
                                min="0"
                                class="form-control bg-dark text-white border-secondary @error('review_count') is-invalid @enderror"
                                placeholder="0">

                            @error('review_count')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                </div>


                <!-- ================================= -->
                <!-- ACTIONS -->
                <!-- ================================= -->

                <div class="card bg-dark border-secondary shadow-sm">

                    <div class="card-body">


                        <button
                            type="submit"
                            class="btn btn-danger w-100 py-2 fw-semibold">

                            <i class="bi bi-check-lg me-1"></i>

                            Create Product

                        </button>


                        <a
                            href="{{ route('admin.products.index') }}"
                            class="btn btn-outline-secondary w-100 mt-2">

                            Cancel

                        </a>


                    </div>

                </div>


            </div>


        </div>

    </form>

</div>


<!-- ========================================= -->
<!-- IMAGE PREVIEW SCRIPT -->
<!-- ========================================= -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const mainImageInput =
        document.getElementById('main_image');

    const mainImagePreview =
        document.getElementById('main-image-preview');

    const mainImagePreviewImage =
        mainImagePreview.querySelector('img');


    if (mainImageInput) {

        mainImageInput.addEventListener('change', function () {

            const file = this.files[0];

            if (!file) {

                mainImagePreview.classList.add('d-none');

                mainImagePreviewImage.src = '';

                return;

            }


            const reader = new FileReader();

            reader.onload = function (event) {

                mainImagePreviewImage.src =
                    event.target.result;

                mainImagePreview.classList.remove('d-none');

            };

            reader.readAsDataURL(file);

        });

    }


    const galleryInput =
        document.getElementById('gallery_images');

    const galleryPreview =
        document.getElementById('gallery-preview');


    if (galleryInput) {

        galleryInput.addEventListener('change', function () {

            galleryPreview.innerHTML = '';


            Array.from(this.files).forEach(function (file) {

                const reader = new FileReader();

                reader.onload = function (event) {

                    const column =
                        document.createElement('div');

                    column.className =
                        'col-6 col-md-4';


                    column.innerHTML = `

                        <div class="border border-secondary rounded overflow-hidden">

                            <img
                                src="${event.target.result}"
                                alt="Gallery preview"
                                class="w-100"
                                style="height: 110px; object-fit: cover;">

                        </div>

                    `;


                    galleryPreview.appendChild(column);

                };


                reader.readAsDataURL(file);

            });

        });

    }

});

</script>

@endsection