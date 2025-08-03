@extends('layouts.admin')

@section('content')
<div class="admin-container">
    <aside class="admin-sidebar">
        @include('admin.partials.sidebar')
    </aside>

    <main class="admin-content">
        <div class="content-header">
            <h2>Edit Order #{{ $order->id }}</h2>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Orders
            </a>
        </div>
        
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="customer_name">Customer Name</label>
                        <input type="text" name="customer_name" id="customer_name" 
                               class="form-control" value="{{ $order->customer_name }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            @foreach(['pending', 'processing', 'completed', 'cancelled'] as $status)
                                <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Order Items</label>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>LKR {{ number_format($product->pivot->price, 2) }}</td>
                                    <td>
                                        <input type="number" name="quantities[{{ $product->id }}]" 
                                               value="{{ $product->pivot->quantity }}" min="1" class="form-control">
                                    </td>
                                    <td>LKR {{ number_format($product->pivot->price * $product->pivot->quantity, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update Order</button>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection