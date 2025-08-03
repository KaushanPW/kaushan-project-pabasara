<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Order extends Model
{
    protected $fillable = [
    'user_id',
    'customer_name',
    'phone',
    'email',
    'order_date',
    'delivery_address',
    'total_price', // Make sure this is included
    'status'
];

public function getTotalAmountAttribute()
{
    return $this->total_price;
}

 public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    // app/Models/Order.php

public function user()
{
    return $this->belongsTo(User::class);
}

public function products()
{
    return $this->belongsToMany(Product::class, 'order_items')
                ->withPivot('quantity', 'price') // if these columns exist in order_items
                ->withTimestamps();
}



}
