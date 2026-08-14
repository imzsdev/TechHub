<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Show Checkout Page
     */
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {

            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');

        }

        return view('checkout.index', compact('cart'));
    }


    /**
     * Place Order
     */
    public function placeOrder(Request $request)
    {
        $request->validate([

            'name' => 'required|string|max:255',

            'email' => 'required|email|max:255',

            'phone' => 'required|string|max:30',

            'address' => 'required|string',

            'city' => 'required|string|max:100',

            'postal_code' => 'nullable|string|max:20',

            'payment_method' => 'required|in:cod,sslcommerz',

            'notes' => 'nullable|string',

        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {

            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');

        }

        DB::beginTransaction();

        try {

            $subtotal = 0;

            foreach ($cart as $item) {

                $subtotal +=
                    $item['price'] * $item['quantity'];

            }

            $shipping = 0;

            $total = $subtotal + $shipping;


            /*
            |--------------------------------------------------------------------------
            | Create Order
            |--------------------------------------------------------------------------
            */

            $order = Order::create([

                'user_id' => auth()->id(),

                'name' => $request->name,

                'email' => $request->email,

                'phone' => $request->phone,

                'address' => $request->address,

                'city' => $request->city,

                'postal_code' => $request->postal_code,

                'payment_method' => $request->payment_method,

                'notes' => $request->notes,

                'subtotal' => $subtotal,

                'shipping' => $shipping,

                'total' => $total,

                'status' => 'pending',

            ]);


            /*
            |--------------------------------------------------------------------------
            | Create Order Items
            |--------------------------------------------------------------------------
            */

            foreach ($cart as $item) {

                OrderItem::create([

                    'order_id' => $order->id,

                    'product_id' => $item['id'],

                    'product_name' => $item['name'],

                    'price' => $item['price'],

                    'quantity' => $item['quantity'],

                    'subtotal' =>
                        $item['price'] * $item['quantity'],

                ]);

            }


            /*
            |--------------------------------------------------------------------------
            | Clear Cart
            |--------------------------------------------------------------------------
            */

            session()->forget('cart');

            DB::commit();

            return redirect()
                ->route('checkout.success', $order)
                ->with(
                    'success',
                    'Your order has been placed successfully!'
                );

        } catch (\Throwable $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Something went wrong while placing your order.'
                );

        }
    }


    /**
     * Order Success Page
     */
    public function success(Order $order)
    {
        return view('checkout.success', compact('order'));
    }
}