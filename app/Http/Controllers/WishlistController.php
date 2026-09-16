<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WishlistController extends Controller
{
    /**
     * Display the user's wishlist.
     */
    public function index(): View
    {
        $wishlists = auth()->user()
            ->wishlists()
            ->with('product')
            ->latest()
            ->get();

        return view('wishlist.index', compact('wishlists'));
    }

    /**
     * Add a product to the wishlist.
     */
    public function store(Product $product): RedirectResponse
    {
        Wishlist::firstOrCreate([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
        ]);

        return back()->with(
            'success',
            'Product added to your wishlist.'
        );
    }

    /**
     * Remove a product from the wishlist.
     */
    public function destroy(Product $product): RedirectResponse
    {
        Wishlist::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->delete();

        return back()->with(
            'success',
            'Product removed from your wishlist.'
        );
    }
}