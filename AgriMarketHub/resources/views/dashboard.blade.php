

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriMarketHub - Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    </head>
@extends('layouts.app')

@section('content')
<div class="dashboard-container">
    <div class="dashboard-header">
        <h1><i class="fas fa-tachometer-alt"></i> Dashboard Overview</h1>
        <div class="user-avatar">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=4CAF50&color=fff" alt="User">
        </div>
    </div>

    <div class="dashboard-content">
        <!-- Profile Section -->
        <div class="profile-card">
            <div class="profile-header">
                <h2><i class="fas fa-user-circle"></i> My Profile</h2>
                <div class="profile-actions">
                    <button id="editProfileBtn" class="btn btn-edit">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                </div>
            </div>

            <div class="profile-view" id="profileView">
                <div class="profile-detail">
                    <span class="detail-label"><i class="fas fa-user"></i> Name:</span>
                    <span class="detail-value">{{ Auth::user()->name }}</span>
                </div>
                <div class="profile-detail">
                    <span class="detail-label"><i class="fas fa-envelope"></i> Email:</span>
                    <span class="detail-value">{{ Auth::user()->email }}</span>
                </div>
                <div class="profile-detail">
                    <span class="detail-label"><i class="fas fa-calendar-alt"></i> Member Since:</span>
                    <span class="detail-value">{{ Auth::user()->created_at->format('M d, Y') }}</span>
                </div>
                
                <form action="{{ route('profile.delete') }}" method="POST" id="deleteAccountForm">
    @csrf
    @method('DELETE')
    <div class="form-group">
        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" name="password" id="confirmPassword" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-danger" onclick="return confirm('This will permanently delete your account. Continue?')">
        <i class="fas fa-trash-alt"></i> Permanently Delete Account
    </button>
</form>
            </div>

            <div class="profile-edit" id="profileEdit" style="display: none;">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name"><i class="fas fa-user"></i> Name</label>
                        <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i> Email</label>
                        <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="current_password"><i class="fas fa-lock"></i> Current Password</label>
                        <input type="password" id="current_password" name="current_password" placeholder="Enter current password to confirm changes">
                    </div>
                    <div class="form-group">
                        <label for="new_password"><i class="fas fa-key"></i> New Password</label>
                        <input type="password" id="new_password" name="new_password" placeholder="Leave blank to keep current">
                    </div>
                    <div class="form-actions">
                        <button type="button" id="cancelEditBtn" class="btn btn-cancel">Cancel</button>
                        <button type="submit" class="btn btn-save">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Recent Orders Section -->
        <div class="orders-card">
            <div class="orders-header">
                <h2><i class="fas fa-shopping-bag"></i> Recent Orders</h2>
                <a href="{{ route('orders.index') }}" class="view-all-link">
                    View All <i class="fas fa-chevron-right"></i>
                </a>
            </div>
            
            @if($orders->isEmpty())
                <div class="empty-orders">
                    <i class="fas fa-shopping-cart"></i>
                    <p>You haven't placed any orders yet.</p>
                    <a href="{{ route('menu') }}" class="btn btn-primary">
                        Browse Products
                    </a>
                </div>
            @else
                <div class="orders-table-container">
                    <table class="orders-table">
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                                    <td>LKR {{ number_format($order->total_price, 2) }}</td>
                                    <td>
                                        <span class="order-status status-{{ strtolower($order->status) }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('orders.show', $order->id) }}" class="order-action">
                                            <i class="fas fa-eye"></i> Details
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</din>

    <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection