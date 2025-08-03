<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
   public function create()
{
    return view('delivery');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'order_id' => 'required|exists:orders,id',
        'customer_name' => 'required|string|max:100',
        'customer_phone' => 'required|string|max:20',
        'delivery_address' => 'required|string',
        'delivery_date' => 'required|date|after_or_equal:today'
    ]);

    $delivery = DB::table('deliveries')->insertGetId([
        'user_id' => Auth::id(),
        'order_id' => $validated['order_id'],
        'customer_name' => $validated['customer_name'],
        'customer_phone' => $validated['customer_phone'],
        'delivery_address' => $validated['delivery_address'],
        'delivery_date' => $validated['delivery_date'],
        'delivery_status' => 'pending',
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return redirect()->route('payment.create')->with([
        'success' => 'Delivery details saved!',
        'delivery_id' => $delivery
    ]);
}

}
     
