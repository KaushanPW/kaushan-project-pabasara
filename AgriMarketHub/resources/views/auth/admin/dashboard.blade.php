@extends('layouts.admin')

@section('content')
<div class="admin-container">
    <aside class="admin-sidebar">
        <div class="sidebar-header">
            <h3>Admin Panel</h3>
        </div>
        <ul class="sidebar-nav">
            <li><a href="{{ route('admin.dashboard') }}" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="{{ route('admin.products') }}"><i class="fas fa-carrot"></i> Products</a></li>
            <li><a href="{{ route('admin.orders') }}"><i class="fas fa-shopping-cart"></i> Orders</a></li>
            <li><a href="{{ route('admin.messages') }}"><i class="fas fa-envelope"></i> Messages</a></li>
            <li><a href="{{ route('admin.payments') }}"><i class="fas fa-credit-card"></i> Payments</a></li>
        </ul>
        <div class="sidebar-footer">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </form>
        </div>
    </aside>

    <main class="admin-content">
        <div class="content-header">
            <h2>Dashboard Overview</h2>
        </div>
        
        <div class="stats-container">
            <div class="stat-card">
                <i class="fas fa-carrot"></i>
                <h3>Products</h3>
                <p>{{ $productCount }}</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-shopping-cart"></i>
                <h3>Orders</h3>
                <p>{{ $orderCount }}</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-envelope"></i>
                <h3>Messages</h3>
                <p>{{ $messageCount }}</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-dollar-sign"></i>
                <h3>Revenue</h3>
                <p>LKR {{ number_format($revenue, 2) }}</p>
            </div>
        </div>

        <div class="recent-activity">
            <h3>Recent Orders</h3>
            <table class="activity-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentOrders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>LKR {{ number_format($order->total_amount, 2) }}</td>
                        <td><span class="status-badge {{ $order->status }}">{{ ucfirst($order->status) }}</span></td>
                        <td><a href="{{ route('admin.orders.show', $order->id) }}" class="view-btn">View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection