<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'image'];
    
    protected static function booted()
    {
        static::deleting(function ($product) {
            if ($product->image) {
                Storage::delete($product->image);
            }
        });
    }

    public function orders()
{
    return $this->belongsToMany(Order::class, 'order_items')
                ->withPivot('quantity', 'price')
                ->withTimestamps();
}

}