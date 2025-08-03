@extends('layouts.app')

<head>
 <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">🛒 Your Shopping Cart</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(empty($cart))
        <p>Your cart is empty.</p>
        <a href="{{ url('/menu') }}" class="btn btn-primary">Go to the Menu Page</a>
    @else
        <form action="{{ route('cart.update') }}" method="POST">
            @csrf
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity(kg)</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cart as $id => $item)
                        @php
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>LKR {{ number_format($item['price'], 2) }}</td>
                            <td>
                                <input type="number" name="quantities[{{ $id }}]" value="{{ $item['quantity'] }}" min="1" class="form-control" style="width: 80px;">
                            </td>
                            <td>LKR {{ number_format($subtotal, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-right">
                <h4>Total Amount: <strong>LKR {{ number_format($total, 2) }}</strong></h4>
            </div>

            <div class="mt-4">
                <a href="{{ url('/menu') }}" class="btn btn-secondary">🛍️ Add More Products</a>
                <button type="submit" class="btn btn-success"> Update Quantities</button>
            </div>
        </form>

        <form action="{{ route('order.form') }}" method="GET" class="mt-2" style="display:inline;">
    @csrf
    <button type="submit" class="btn btn-primary">📦 Proceed to Order</button>
</form>


        <form action="{{ route('cart.clear') }}" method="POST" class="mt-2">
            @csrf
            <button type="submit" class="btn btn-danger">🗑️ Clear Cart</button>
        </form>
    @endif
</div>
@endsection