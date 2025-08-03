<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string',
            'price' => 'required|numeric|min:0'
        ]);

        $productId = $request->product_id;
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                "product_id" => $productId,
                "name" => $request->name,
                "price" => (float)$request->price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);

        if (Auth::check()) {
            $userId = Auth::id();
            $existing = DB::table('cart_items')
                ->where('user_id', $userId)
                ->where('product_id', $productId)
                ->first();

            if ($existing) {
                DB::table('cart_items')
                    ->where('id', $existing->id)
                    ->update([
                        'quantity' => $existing->quantity + 1,
                        'updated_at' => now()
                    ]);
            } else {
                DB::table('cart_items')->insert([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'quantity' => 1,
                    'price' => $request->price,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        return redirect()->route('cart.view')->with('success', 'Item added to cart!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1'
        ]);
        
        $cart = session()->get('cart', []);

        foreach ($request->quantities as $id => $quantity) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $quantity;
            }
        }

        session()->put('cart', $cart);

        if (Auth::check()) {
            $userId = Auth::id();

            foreach ($request->quantities as $productId => $quantity) {
                DB::table('cart_items')
                    ->where('user_id', $userId)
                    ->where('product_id', $productId)
                    ->update([
                        'quantity' => $quantity,
                        'updated_at' => now()
                    ]);
            }
        }

        return redirect()->route('cart.view')->with('success', 'Cart updated!');
    }

    public function clear()
    {
        session()->forget('cart');

        if (Auth::check()) {
            $userId = Auth::id();
            DB::table('cart_items')->where('user_id', $userId)->delete();
        }

        return redirect()->route('cart.view')->with('success', 'Cart cleared!');
    }

    public function view()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }
}