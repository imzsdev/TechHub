<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'slug',
        'sku',
        'brand',
        'category',
        'short_description',
        'description',
        'price',
        'sale_price',
        'stock',
        'main_image',
        'gallery_images',
        'rating',
        'review_count',
        'is_featured',
        'is_flash_sale',
        'is_active',
    ];

    /**
     * Attribute casting.
     */
    protected $casts = [
        'gallery_images' => 'array',
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'rating' => 'decimal:1',
        'is_featured' => 'boolean',
        'is_flash_sale' => 'boolean',
        'is_active' => 'boolean',
    ];
}