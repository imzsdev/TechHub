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
    public function index(): View
    {
        $search = request('search');
        $sort = request('sort', 'newest');
        $status = request('status', 'all');

        $allowedSorts = [
            'newest',
            'oldest',
            'name_asc',
            'name_desc',
            'price_asc',
            'price_desc',
            'stock_asc',
            'stock_desc',
        ];

        if (! in_array($sort, $allowedSorts, true)) {
            $sort = 'newest';
        }

        $allowedStatuses = [
            'all',
            'active',
            'inactive',
            'featured',
            'flash_sale',
            'out_of_stock',
        ];

        if (! in_array($status, $allowedStatuses, true)) {
            $status = 'all';
        }

        $products = Product::query()

            /*
            |--------------------------------------------------------------------------
            | Search
            |--------------------------------------------------------------------------
            */

            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query
                        ->where('name', 'like', "%{$search}%")
                        ->orWhere('sku', 'like', "%{$search}%")
                        ->orWhere('brand', 'like', "%{$search}%")
                        ->orWhere('category', 'like', "%{$search}%");
                });
            })

            /*
            |--------------------------------------------------------------------------
            | Status Filter
            |--------------------------------------------------------------------------
            */

            ->when($status === 'active', function ($query) {
                $query->where('is_active', true);
            })

            ->when($status === 'inactive', function ($query) {
                $query->where('is_active', false);
            })

            ->when($status === 'featured', function ($query) {
                $query->where('is_featured', true);
            })

            ->when($status === 'flash_sale', function ($query) {
                $query->where('is_flash_sale', true);
            })

            ->when($status === 'out_of_stock', function ($query) {
                $query->where('stock', '<=', 0);
            })

            /*
            |--------------------------------------------------------------------------
            | Sorting
            |--------------------------------------------------------------------------
            */

            ->when($sort === 'newest', function ($query) {
                $query->latest();
            })

            ->when($sort === 'oldest', function ($query) {
                $query->oldest();
            })

            ->when($sort === 'name_asc', function ($query) {
                $query->orderBy('name', 'asc');
            })

            ->when($sort === 'name_desc', function ($query) {
                $query->orderBy('name', 'desc');
            })

            ->when($sort === 'price_asc', function ($query) {
                $query->orderBy('price', 'asc');
            })

            ->when($sort === 'price_desc', function ($query) {
                $query->orderBy('price', 'desc');
            })

            ->when($sort === 'stock_asc', function ($query) {
                $query->orderBy('stock', 'asc');
            })

            ->when($sort === 'stock_desc', function ($query) {
                $query->orderBy('stock', 'desc');
            })

            /*
            |--------------------------------------------------------------------------
            | Pagination
            |--------------------------------------------------------------------------
            */

            ->paginate(15)
            ->withQueryString();

        return view('admin.products.index', compact(
            'products',
            'search',
            'sort',
            'status'
        ));
    }

    public function create(): View
    {
        return view('admin.products.create');
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request
                ->file('main_image')
                ->store('products', 'public');
        }

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

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_flash_sale'] = $request->boolean('is_flash_sale');
        $data['is_active'] = $request->boolean('is_active');

        $data['rating'] = $data['rating'] ?? 0;
        $data['review_count'] = $data['review_count'] ?? 0;

        Product::create($data);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(
        UpdateProductRequest $request,
        Product $product
    ): RedirectResponse {
        $data = $request->validated();

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

        if ($request->hasFile('gallery_images')) {
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

            $galleryImages = [];

            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store(
                    'products/gallery',
                    'public'
                );
            }

            $data['gallery_images'] = $galleryImages;
        }

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_flash_sale'] = $request->boolean('is_flash_sale');
        $data['is_active'] = $request->boolean('is_active');

        $product->update($data);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        if (
            $product->main_image &&
            Storage::disk('public')->exists($product->main_image)
        ) {
            Storage::disk('public')->delete(
                $product->main_image
            );
        }

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

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}