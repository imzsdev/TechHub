<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [

        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'postal_code',
        'payment_method',
        'notes',
        'subtotal',
        'shipping',
        'total',
        'status',

    ];

    /**
     * Order belongs to User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Order has many Order Items
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}