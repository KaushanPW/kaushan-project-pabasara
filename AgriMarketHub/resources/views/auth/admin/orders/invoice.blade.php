<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .invoice-box { max-width: 800px; margin: auto; padding: 30px; border: 1px solid #eee; }
        .header { display: flex; justify-content: space-between; margin-bottom: 20px; }
        .logo { font-size: 24px; font-weight: bold; }
        .info { text-align: right; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; border-bottom: 1px solid #eee; text-align: left; }
        .total { font-weight: bold; font-size: 18px; }
        .footer { margin-top: 30px; text-align: center; color: #777; }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="header">
            <div class="logo">AgriMarketHub</div>
            <div class="info">
                <h2>INVOICE</h2>
                <p>#{{ $order->id }}</p>
                <p>Date: {{ $order->created_at->format('M d, Y') }}</p>
            </div>
        </div>
        
        <div class="details">
            <p><strong>Customer:</strong> {{ $order->customer_name }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>LKR {{ number_format($product->pivot->price, 2) }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>LKR {{ number_format($product->pivot->price * $product->pivot->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="total">
                    <td colspan="3">Total</td>
                    <td>LKR {{ number_format($order->total_price, 2) }}</td>
                </tr>
            </tfoot>
        </table>
        
        <div class="footer">
            <p>Thank you for your business!</p>
            <p>AgriMarketHub - Ratnapura Rd, Wewelkadhura, Kalawana</p>
        </div>
    </div>
</body>
</html>