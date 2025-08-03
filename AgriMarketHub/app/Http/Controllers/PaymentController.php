<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PaymentController extends Controller
{
    public function create()
{
    // Get the latest order for the authenticated user
    $order = Order::where('user_id', auth()->id())
                ->latest()
                ->firstOrFail();
    
    return view('payment', compact('order'));
}
    
 public function store(Request $request)
{
    // Validation with custom exists rule
   $validated = $request->validate([
    'order_id' => [
        'required',
        Rule::exists('orders', 'id')->where(function ($query) {
            $query->where('total_price', '>', 0)
                  ->where('user_id', auth()->id());
        })
    ],
    'payment_method' => 'required|in:credit_card,debit_card,cash_on_delivery',
    // ... other validation rules
]);

    // Rest of your payment processing logic
    $order = Order::find($validated['order_id']);

    $payment = Payment::create([
        'user_id' => auth()->id(),
        'order_id' => $order->id,
        'method' => $validated['payment_method'],
        'amount' => $order->total_price,
        'payment_status' => 'pending',
        // ... other payment fields
    ]);

    return redirect()->route('payment.success', $payment);
}

   public function success(Payment $payment)
{
    // Verify payment belongs to authenticated user
    if ($payment->user_id !== auth()->id()) {
        abort(403);
    }

    return view('payment.success', compact('payment'));
}
}