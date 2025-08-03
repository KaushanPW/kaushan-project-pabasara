<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'deliveries';
    
    protected $fillable = [
        'order_id',
        'name',
        'phone',
        'address',
        'date'
    ];
}