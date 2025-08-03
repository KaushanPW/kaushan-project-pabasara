<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'cart_items';

    protected $fillable = [
        'order_id',      // added
        'product_id',
        'quantity',
        'price',         // added
        'created_at',    // added (optional if using timestamps)
        'updated_at',    // added (optional if using timestamps)
    ];
}
