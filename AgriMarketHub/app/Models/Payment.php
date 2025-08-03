<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   // app/Models/Payment.php
protected $fillable = [
    'user_id',
    'order_id',
    'method', // or 'payment_method' if you renamed it
    'amount',
    'payment_status', // or 'status' if you renamed it
    'transaction_id',
    'payment_date'
];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'amount' => 'decimal:2',
    ];

    /**
     * Get the user that owns the payment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the order associated with the payment.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}