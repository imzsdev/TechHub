<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display Cart
     */
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('cart.index', compact('cart'));
    }

    /**
     * Add Product To Cart
     */
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {

            $cart[$product->id]['quantity']++;

        } else {

            $cart[$product->id] = [

                'id'       => $product->id,
                'name'     => $product->name,
                'price'    => $product->price,
                'image'    => $product->gallery_images[0],
                'quantity' => 1,

            ];
        }

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.index')
            ->with('success', 'Product added to cart successfully!');
    }

    /**
     * Increase Quantity
     */
    public function increase($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    /**
     * Decrease Quantity
     */
    public function decrease($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            if ($cart[$id]['quantity'] > 1) {

                $cart[$id]['quantity']--;

            } else {

                unset($cart[$id]);
            }

            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    /**
     * Remove Product
     */
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            unset($cart[$id]);

            session()->put('cart', $cart);
        }

        return redirect()
            ->route('cart.index')
            ->with('success', 'Product removed from cart.');
    }
}