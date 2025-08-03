@extends('layouts.admin')

@section('content')
<style>
    /* Admin Layout Styles */
    .admin-container {
        display: flex;
        min-height: 100vh;
    }

    .admin-sidebar {
        width: 250px;
        background-color: #343a40;
        color: white;
        padding: 20px 0;
        position: fixed;
        height: 100%;
        transition: all 0.3s;
    }

    .admin-content {
        flex: 1;
        margin-left: 250px;
        padding: 20px;
        background-color: #f8f9fa;
        min-height: 100vh;
    }

    /* Content Header */
    .content-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 1px solid #dee2e6;
    }

    .content-header h2 {
        margin: 0;
        color: #495057;
        font-weight: 600;
    }

    /* Button Styles */
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 15px;
        border-radius: 4px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 14px;
        gap: 5px;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
        border: 1px solid #007bff;
    }

    .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
    }

    .btn-sm {
        padding: 5px 10px;
        font-size: 12px;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
        border: 1px solid #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    /* Table Styles */
    .table-responsive {
        overflow-x: auto;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    .table th {
        background-color: #f8f9fa;
        color: #495057;
        font-weight: 600;
        padding: 12px 15px;
        text-align: left;
        border-bottom: 2px solid #dee2e6;
    }

    .table td {
        padding: 12px 15px;
        border-bottom: 1px solid #dee2e6;
        vertical-align: middle;
    }

    .table tr:last-child td {
        border-bottom: none;
    }

    .table tr:hover {
        background-color: #f8f9fa;
    }

    /* Image Styles */
    .table img {
        max-width: 50px;
        height: auto;
        border-radius: 3px;
        object-fit: cover;
    }

    /* Form Styles */
    form {
        display: inline-block;
        margin: 0;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .admin-sidebar {
            width: 70px;
            overflow: hidden;
        }
        
        .admin-content {
            margin-left: 70px;
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
        @include('admin.partials.sidebar') <!-- Optional sidebar partial -->
    </aside>

    <main class="admin-content">
        <div class="content-header">
            <h2>Product Management</h2>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Product
            </a>
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>LKR {{ number_format($product->price, 2) }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" width="50" alt="{{ $product->name }}">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection