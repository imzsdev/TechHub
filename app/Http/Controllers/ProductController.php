<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function show($slug)
    {
        $product = [

            'slug' => $slug,

            'name' => 'Gaming Headphones',

            'price' => '৳ 5,999',

            'rating' => '4.9',

            'description' => 'Premium wireless gaming headphones with RGB lighting, crystal clear microphone and immersive surround sound.',

            'images' => [

                'images/products/headphone.png',

                'images/products/keyboard.png',

                'images/products/laptop.png',

                'images/products/watch.png',

            ],

        ];

        return view('products.show', compact('product'));
    }
}