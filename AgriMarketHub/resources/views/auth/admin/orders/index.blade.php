@extends('layouts.admin')

@section('content')
<style>
    /* Admin Layout */
    .admin-container {
        display: flex;
        min-height: 100vh;
        background-color: #f8f9fa;
    }
    .admin-sidebar {
        width: 250px;
        background: #2c3e50;
        color: white;
        padding: 20px 0;
    }
    .admin-content {
        flex: 1;
        padding: 20px;
        background-color: #f8f9fa;
    }

    /* Header */
    .content-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }
    .content-header h2 {
        margin: 0;
        color: #343a40;
        font-size: 1.8rem;
    }

    /* Buttons */
    .btn {
        padding: 8px 16px;
        border-radius: 4px;
        font-weight: 500;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    .btn-primary {
        background-color: #3490dc;
        border-color: #3490dc;
        color: white;
    }
    .btn-primary:hover {
        background-color: #227dc7;
    }
    .btn-sm {
        padding: 5px 10px;
        font-size: 12px;
    }
    .btn-info {
        background-color: #17a2b8;
        color: white;
    }
    .btn-info:hover {
        background-color: #138496;
    }

    /* Table */
    .table {
        width: 100%;
        background: white;
        border-collapse: collapse;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    .table th {
        background-color: #f8f9fa;
        color: #495057;
        font-weight: 600;
        padding: 12px 15px;
        text-align: left;
        border-bottom: 2px solid #e9ecef;
    }
    .table td {
        padding: 12px 15px;
        border-bottom: 1px solid #e9ecef;
        vertical-align: middle;
    }
    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }

    /* Status Badges */
    .badge {
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: capitalize;
    }
    .badge-warning { background-color: #ffc107; color: #212529; }
    .badge-info { background-color: #17a2b8; color: white; }
    .badge-success { background-color: #28a745; color: white; }
    .badge-danger { background-color: #dc3545; color: white; }

    /* Pagination */
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    .pagination .page-item.active .page-link {
        background-color: #3490dc;
        border-color: #3490dc;
    }
    .pagination .page-link {
        color: #3490dc;
        padding: 8px 16px;
        margin: 0 5px;
        border-radius: 4px;
        border: 1px solid #dee2e6;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .admin-container {
            flex-direction: column;
        }
        .admin-sidebar {
            width: 100%;
        }
        .content-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
    }
</style>

<div class="admin-container">
    <aside class="admin-sidebar">
        @include('admin.partials.sidebar')
    </aside>

    <main class="admin-content">
        <div class="content-header">
            <h2>Order Management</h2>
            <div class="action-buttons">
                <a href="{{ route('admin.orders.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Create Order
                </a>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
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
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                            <td>LKR {{ number_format($order->total_price, 2) }}</td>
                            <td>
                                <span class="badge badge-{{ [
                                    'pending' => 'warning',
                                    'processing' => 'info',
                                    'completed' => 'success',
                                    'cancelled' => 'danger'
                                ][$order->status] }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </main>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@endsection