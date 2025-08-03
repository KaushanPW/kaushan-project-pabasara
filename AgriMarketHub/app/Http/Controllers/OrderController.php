<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function create()
    {
        // For example, return the order form view
        return view('order');
    }

public function form()
{
    $cart = session()->get('cart', []);
    // TEMP: allow empty cart for testing
    return view('order', compact('cart'));
}

public function store(Request $request)
{
    $request->validate([
        'customer_name' => 'required|string',
        'phone' => 'required',
        'email' => 'nullable|email',
        'order_date' => 'required|date',
        'delivery_address' => 'nullable|string',
    ]);

    $cart = session()->get('cart', []);
    if (empty($cart)) {
        return redirect()->route('cart.view')->with('error', 'Cart is empty!');
    }

    // Calculate total
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    // Insert into orders table
    $orderId = DB::table('orders')->insertGetId([
        'user_id' => auth()->id(),
        'customer_name' => $request->customer_name,
        'phone' => $request->phone,
        'email' => $request->email,
        'order_date' => $request->order_date,
        'delivery_address' => $request->delivery_address,
        'total_price' => $total,
        'status' => 'pending',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Insert into order_items table
    foreach ($cart as $item) {
        DB::table('order_items')->insert([
            'order_id' => $orderId,
            'product_id' => $item['product_id'],
            'quantity' => $item['quantity'],
            'price' => $item['price'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }

    session()->forget('cart');
       
    return redirect()->route('payment.create')->with('success', 'Order placed! Please fill delivery details.');
}



}