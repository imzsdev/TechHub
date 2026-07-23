<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([

            [
                'name' => 'Gaming Headphones',
                'slug' => 'gaming-headphones',
                'sku' => 'TH-HP-001',
                'brand' => 'TechHub',
                'category' => 'Headphones',
                'short_description' => 'Premium Gaming Headphones',
                'description' => 'Premium wireless gaming headphones with RGB lighting and crystal clear sound.',
                'price' => 5999,
                'sale_price' => 5499,
                'stock' => 25,
                'main_image' => 'images/products/headphone.png',
                'gallery_images' => json_encode([
                    'images/products/headphone.png',
                    'images/products/headphone.png',
                    'images/products/headphone.png',
                    'images/products/headphone.png',
                ]),
                'rating' => 4.9,
                'review_count' => 1248,
                'is_featured' => true,
                'is_flash_sale' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Gaming Laptop',
                'slug' => 'gaming-laptop',
                'sku' => 'TH-LP-001',
                'brand' => 'TechHub',
                'category' => 'Laptop',
                'short_description' => 'High Performance Laptop',
                'description' => 'Powerful gaming laptop for creators and gamers.',
                'price' => 129999,
                'sale_price' => 124999,
                'stock' => 12,
                'main_image' => 'images/products/laptop.png',
                'gallery_images' => json_encode([
                    'images/products/laptop.png',
                    'images/products/laptop.png',
                    'images/products/laptop.png',
                ]),
                'rating' => 4.8,
                'review_count' => 756,
                'is_featured' => true,
                'is_flash_sale' => false,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Mechanical Keyboard',
                'slug' => 'mechanical-keyboard',
                'sku' => 'TH-KB-001',
                'brand' => 'TechHub',
                'category' => 'Keyboard',
                'short_description' => 'RGB Mechanical Keyboard',
                'description' => 'Premium RGB mechanical keyboard with blue switches.',
                'price' => 6999,
                'sale_price' => 6499,
                'stock' => 35,
                'main_image' => 'images/products/keyboard.png',
                'gallery_images' => json_encode([
                    'images/products/keyboard.png',
                    'images/products/keyboard.png',
                ]),
                'rating' => 4.7,
                'review_count' => 538,
                'is_featured' => true,
                'is_flash_sale' => false,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Smart Watch',
                'slug' => 'smart-watch',
                'sku' => 'TH-WT-001',
                'brand' => 'TechHub',
                'category' => 'Watch',
                'short_description' => 'Premium Smart Watch',
                'description' => 'Stylish smartwatch with health tracking and AMOLED display.',
                'price' => 8999,
                'sale_price' => 7999,
                'stock' => 18,
                'main_image' => 'images/products/watch.png',
                'gallery_images' => json_encode([
                    'images/products/watch.png',
                    'images/products/watch.png',
                ]),
                'rating' => 4.8,
                'review_count' => 402,
                'is_featured' => false,
                'is_flash_sale' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}