<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Product Listing
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $category = $request->input('category');

        $brand = $request->input('brand');

        $maxPrice = $request->input('max_price');


        $products = Product::where('is_active', true)

            // Search
            ->when($search, function ($query) use ($search) {

                $query->where(function ($query) use ($search) {

                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('brand', 'like', '%' . $search . '%')
                        ->orWhere('category', 'like', '%' . $search . '%')
                        ->orWhere(
                            'short_description',
                            'like',
                            '%' . $search . '%'
                        );

                });

            })

            // Category
            ->when($category, function ($query) use ($category) {

                $query->where('category', $category);

            })

            // Brand
            ->when($brand, function ($query) use ($brand) {

                $query->where('brand', $brand);

            })

            // Maximum Price
            ->when($maxPrice, function ($query) use ($maxPrice) {

                $query->where(function ($query) use ($maxPrice) {

                    $query->where(function ($query) use ($maxPrice) {

                        $query->whereNull('sale_price')
                            ->where('price', '<=', $maxPrice);

                    })

                    ->orWhere(function ($query) use ($maxPrice) {

                        $query->whereNotNull('sale_price')
                            ->where('sale_price', '<=', $maxPrice);

                    });

                });

            })

            ->latest()
            ->get();


        return view('products.index', compact(
            'products',
            'search',
            'category',
            'brand',
            'maxPrice'
        ));
    }


    /**
     * Product Details
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('products.show', compact('product'));
    }
}