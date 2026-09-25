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

        $sort = $request->input('sort', 'newest');


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

            });


        /*
        |--------------------------------------------------------------------------
        | Sorting
        |--------------------------------------------------------------------------
        */

        switch ($sort) {

            case 'price_low':
                $products->orderByRaw(
                    'COALESCE(sale_price, price) ASC'
                );
                break;


            case 'price_high':
                $products->orderByRaw(
                    'COALESCE(sale_price, price) DESC'
                );
                break;


            case 'best_selling':

                /*
                 * Sales/order quantity tracking will be added
                 * in the backend phase.
                 *
                 * For now, products with higher review counts
                 * appear first as a temporary storefront signal.
                 */

                $products->orderByDesc('review_count')
                    ->orderByDesc('rating');

                break;


            case 'newest':
            default:
                $products->latest();
                break;

        }


        $products = $products->get();


        $wishlistProductIds = [];

        if (auth()->check()) {

            $wishlistProductIds = auth()
                ->user()
                ->wishlists()
                ->pluck('product_id')
                ->toArray();

        }

        return view('products.index', compact(
            'products',
            'search',
            'category',
            'brand',
            'maxPrice',
            'sort'
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