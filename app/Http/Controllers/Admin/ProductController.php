<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index(): View
    {
        $search = request('search');

        $products = Product::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query
                        ->where('name', 'like', "%{$search}%")
                        ->orWhere('sku', 'like', "%{$search}%")
                        ->orWhere('brand', 'like', "%{$search}%")
                        ->orWhere('category', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.products.index', compact('products', 'search'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create(): View
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created product.
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $data = $request->validated();

        /*
        |--------------------------------------------------------------------------
        | Main Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request
                ->file('main_image')
                ->store('products', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Gallery Images
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gallery_images')) {

            $galleryImages = [];

            foreach ($request->file('gallery_images') as $image) {

                $galleryImages[] = $image->store(
                    'products/gallery',
                    'public'
                );
            }

            $data['gallery_images'] = $galleryImages;
        }

        /*
        |--------------------------------------------------------------------------
        | Boolean Fields
        |--------------------------------------------------------------------------
        */

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_flash_sale'] = $request->boolean('is_flash_sale');
        $data['is_active'] = $request->boolean('is_active');

        /*
        |--------------------------------------------------------------------------
        | Default Values
        |--------------------------------------------------------------------------
        */

        $data['rating'] = $data['rating'] ?? 0;
        $data['review_count'] = $data['review_count'] ?? 0;

        /*
        |--------------------------------------------------------------------------
        | Create Product
        |--------------------------------------------------------------------------
        */

        Product::create($data);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product): View
    {
        return view(
            'admin.products.edit',
            compact('product')
        );
    }

    /**
     * Update the specified product.
     */
    public function update(
        UpdateProductRequest $request,
        Product $product
    ): RedirectResponse {

        $data = $request->validated();

        /*
        |--------------------------------------------------------------------------
        | Main Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('main_image')) {

            if (
                $product->main_image &&
                Storage::disk('public')->exists($product->main_image)
            ) {
                Storage::disk('public')->delete(
                    $product->main_image
                );
            }

            $data['main_image'] = $request
                ->file('main_image')
                ->store('products', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Gallery Images
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gallery_images')) {

            /*
            | Delete old gallery images
            */

            if (is_array($product->gallery_images)) {

                foreach ($product->gallery_images as $image) {

                    if (
                        $image &&
                        Storage::disk('public')->exists($image)
                    ) {
                        Storage::disk('public')->delete($image);
                    }
                }
            }

            /*
            | Store new gallery images
            */

            $galleryImages = [];

            foreach ($request->file('gallery_images') as $image) {

                $galleryImages[] = $image->store(
                    'products/gallery',
                    'public'
                );
            }

            $data['gallery_images'] = $galleryImages;
        }

        /*
        |--------------------------------------------------------------------------
        | Boolean Fields
        |--------------------------------------------------------------------------
        */

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_flash_sale'] = $request->boolean('is_flash_sale');
        $data['is_active'] = $request->boolean('is_active');

        /*
        |--------------------------------------------------------------------------
        | Update Product
        |--------------------------------------------------------------------------
        */

        $product->update($data);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product.
     */
    public function destroy(Product $product): RedirectResponse
    {
        /*
        |--------------------------------------------------------------------------
        | Delete Main Image
        |--------------------------------------------------------------------------
        */

        if (
            $product->main_image &&
            Storage::disk('public')->exists($product->main_image)
        ) {
            Storage::disk('public')->delete(
                $product->main_image
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Gallery Images
        |--------------------------------------------------------------------------
        */

        if (is_array($product->gallery_images)) {

            foreach ($product->gallery_images as $image) {

                if (
                    $image &&
                    Storage::disk('public')->exists($image)
                ) {
                    Storage::disk('public')->delete($image);
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Product
        |--------------------------------------------------------------------------
        */

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}