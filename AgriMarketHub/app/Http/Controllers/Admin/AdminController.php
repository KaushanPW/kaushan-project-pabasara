<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Payment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function dashboard()
{
    $productCount = Product::count();
    $orderCount = Order::count();
    $messageCount = Contact::count();
    $revenue = Order::where('status', 'completed')->sum('total_price');
    $recentOrders = Order::latest()->take(5)->get();

    return view('auth.admin.dashboard', compact(
        'productCount',
        'orderCount',
        'messageCount',
        'revenue',
        'recentOrders'
    ));
}

   // Products
public function products()
{
    $products = Product::all();
    return view('auth.admin.products.index', compact('products'));
}

public function createProduct()
{
    return view('auth.admin.products.create');
}

public function storeProduct(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|max:2048'
    ]);

    $product = Product::create($validated);
    
    if ($request->hasFile('image')) {
        $product->image = $request->file('image')->store('products', 'public');
        $product->save();
    }

    return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
}

public function editProduct(Product $product)
{
    return view('auth.admin.products.edit', compact('product'));
}

public function updateProduct(Request $request, Product $product)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|max:2048'
    ]);

    $product->update($validated);
    
    if ($request->hasFile('image')) {
        Storage::delete($product->image);
        $product->image = $request->file('image')->store('products', 'public');
        $product->save();
    }

    return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
}

public function destroyProduct(Product $product)
{
    if ($product->image) {
        Storage::delete($product->image);
    }
    $product->delete();
    
    return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
}

 



// Order Methods
public function orders()
{
    $orders = Order::with(['user', 'products'])->latest()->paginate(10);
    return view('auth.admin.orders.index', compact('orders'));
}

public function createOrder()
{
    $products = Product::all();
    return view('auth.admin.orders.create', compact('products'));
}

public function storeOrder(Request $request)
{
    $validated = $request->validate([
        'customer_name' => 'required|string|max:255',
        'products' => 'required|array',
        'products.*.id' => 'required|exists:products,id',
        'products.*.quantity' => 'required|integer|min:1',
    ]);

    // Create the order
    $order = Order::create([
        'user_id' => auth()->id(), // or admin-placed
        'customer_name' => $validated['customer_name'],
        'status' => 'pending',
    ]);

    // Attach products
    foreach ($validated['products'] as $item) {
        $order->products()->attach($item['id'], [
            'quantity' => $item['quantity'],
            'price' => Product::find($item['id'])->price,
        ]);
    }

    return redirect()->route('admin.orders.index')->with('success', 'Order created successfully.');
}


public function showOrder(Order $order)
{
    return view('auth.admin.orders.show', compact('order'));
}

public function editOrder(Order $order)
{
    $products = Product::all();
    return view('auth.admin.orders.edit', compact('order', 'products'));
}

public function updateOrder(Request $request, Order $order)
{
    // Update logic
}

public function destroyOrder(Order $order)
{
    $order->delete();
    return redirect()->route('admin.orders.index')->with('success', 'Order deleted');
}

public function updateStatus(Request $request, Order $order)
{
    $order->update(['status' => $request->status]);
    return back()->with('success', 'Status updated');
}

public function showInvoice(Order $order)
{
    return view('auth.admin.orders.invoice', compact('order'));
}

    public function messages()
    {
        $messages = Contact::latest()->get();
        return view('auth.admin.messages.index', compact('messages'));
    }




   public function payments()
{
    $payments = Payment::with('order')->latest()->paginate(10);
    return view('auth.admin.payments.index', compact('payments'));
}

    // In app/Http/Controllers/Admin/AdminController.php

public function logout(Request $request)
{
    Auth::logout();
    
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    
    return redirect('/');
}

}
