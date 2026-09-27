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
        $request->validate([
            'product_id' => ['required', 'integer'],
            'quantity'   => ['nullable', 'integer', 'min:1'],
        ]);

        $product = Product::findOrFail($request->product_id);

        if (!$product->is_active || $product->stock <= 0) {

            return back()->with(
                'error',
                'This product is currently unavailable.'
            );

        }


        $quantity = (int) $request->input('quantity', 1);

        $cart = session()->get('cart', []);


        /*
        |--------------------------------------------------------------------------
        | Existing Product
        |--------------------------------------------------------------------------
        */

        if (isset($cart[$product->id])) {

            $newQuantity =
                $cart[$product->id]['quantity'] + $quantity;


            if ($newQuantity > $product->stock) {

                $cart[$product->id]['quantity'] = $product->stock;

                session()->put('cart', $cart);

                return redirect()
                    ->route('cart.index')
                    ->with(
                        'error',
                        'Maximum available stock reached.'
                    );

            }


            $cart[$product->id]['quantity'] = $newQuantity;

        }


        /*
        |--------------------------------------------------------------------------
        | New Product
        |--------------------------------------------------------------------------
        */

        else {

            if ($quantity > $product->stock) {

                $quantity = $product->stock;

            }


            $cart[$product->id] = [

                'id'       => $product->id,

                'name'     => $product->name,

                'price'    => (float) (
                    $product->sale_price
                    ?? $product->price
                ),

                'image'    => $product->gallery_images[0]
                    ?? $product->main_image,

                'quantity' => $quantity,

            ];

        }


        session()->put('cart', $cart);


        return redirect()
            ->route('cart.index')
            ->with(
                'success',
                'Product added to cart successfully!'
            );
    }


    /**
     * Increase Quantity
     */
    public function increase($id)
    {
        $cart = session()->get('cart', []);


        if (!isset($cart[$id])) {

            return redirect()->route('cart.index');

        }


        $product = Product::find($id);


        if (!$product || !$product->is_active) {

            unset($cart[$id]);

            session()->put('cart', $cart);

            return redirect()
                ->route('cart.index')
                ->with(
                    'error',
                    'This product is no longer available.'
                );

        }


        if ($cart[$id]['quantity'] < $product->stock) {

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


        if (!isset($cart[$id])) {

            return redirect()->route('cart.index');

        }


        if ($cart[$id]['quantity'] > 1) {

            $cart[$id]['quantity']--;

        }

        else {

            unset($cart[$id]);

        }


        session()->put('cart', $cart);


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
            ->with(
                'success',
                'Product removed from cart.'
            );
    }
}