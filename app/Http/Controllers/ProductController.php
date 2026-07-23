<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Product Listing
     */
    public function index()
    {
        $products = Product::where('is_active', true)
            ->latest()
            ->get();

        return view('products.index', compact('products'));
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