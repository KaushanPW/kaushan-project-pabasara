@extends('layouts.admin')

@section('content')
<style>
    /* Admin Layout */
    .admin-container {
        display: flex;
        min-height: 100vh;
        background-color: #f5f7fa;
    }

    .admin-content {
        flex: 1;
        padding: 20px;
        margin-left: 250px; /* Adjust based on sidebar width */
    }

    /* Content Header */
    .content-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .content-header h2 {
        color: #2d3748;
        font-size: 1.5rem;
        font-weight: 600;
    }

    /* Card Styles */
    .card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .card-body {
        padding: 20px;
    }

    /* Table Styles */
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.02);
    }

    .table th {
        background-color: #f8fafc;
        color: #4a5568;
        padding: 12px 15px;
        text-align: left;
        font-weight: 600;
        border-bottom: 2px solid #e2e8f0;
    }

    .table td {
        padding: 12px 15px;
        border-bottom: 1px solid #e2e8f0;
        vertical-align: middle;
    }

    /* Badge Styles */
    .badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 600;
    }

    .badge-success {
        background-color: #48bb78;
        color: white;
    }

    .badge-warning {
        background-color: #ed8936;
        color: white;
    }

    .badge-danger {
        background-color: #f56565;
        color: white;
    }

    /* Button Styles */
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 12px;
        border-radius: 4px;
        font-weight: 500;
        font-size: 13px;
        transition: all 0.2s;
        cursor: pointer;
    }

    .btn-sm {
        padding: 5px 10px;
        font-size: 12px;
    }

    .btn-primary {
        background-color: #4299e1;
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background-color: #3182ce;
    }

    .btn-info {
        background-color: #63b3ed;
        color: white;
        border: none;
    }

    .btn-info:hover {
        background-color: #4299e1;
    }

    /* Pagination */
    .pagination {
        display: flex;
        justify-content: center;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination li a {
        padding: 5px 10px;
        border-radius: 4px;
        color: #4a5568;
        text-decoration: none;
    }

    .pagination li.active a {
        background-color: #4299e1;
        color: white;
    }

    .pagination li a:hover {
        background-color: #ebf8ff;
    }

    /* Empty State */
    .text-center {
        text-align: center;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .admin-content {
            margin-left: 0;
            padding: 15px;
        }

        .content-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .action-buttons {
            margin-top: 10px;
        }

        .table {
            display: block;
            overflow-x: auto;
        }
    }
</style>
<div class="admin-container">
    <aside class="admin-sidebar">
        @include('admin.partials.sidebar')
    </aside>
<div class="admin-container">
    <!-- Sidebar -->
    <!-- Main Content -->
    <main class="admin-content">
        <div class="content-header">
            <h2>Payment Records</h2>
            <div class="action-buttons">
                <a href="#" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add Payment
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <!-- Payment Table -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Order</th>
                            <th>Amount</th>
                            <th>Method</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($payments as $payment)
                        <tr>
                            <td>#{{ $payment->id }}</td>
                            <td>
                                <a href="{{ route('admin.orders.show', $payment->order_id) }}">
                                    Order #{{ $payment->order_id }}
                                </a>
                            </td>
                            <td>LKR {{ number_format($payment->amount, 2) }}</td>
                            <td>{{ ucfirst($payment->payment_method) }}</td>
                            <td>
                                <span class="badge badge-{{ 
                                    $payment->status === 'completed' ? 'success' : 
                                    ($payment->status === 'failed' ? 'danger' : 'warning') 
                                }}">
                                    {{ ucfirst($payment->status) }}
                                </span>
                            </td>
                            <td>{{ $payment->created_at->format('M j, Y') }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">No payments found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $payments->links() }}
                </div>
            </div>
        </div>
    </main>
</div>
@endsection