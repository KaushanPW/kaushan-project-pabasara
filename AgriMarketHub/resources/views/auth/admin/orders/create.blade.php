@extends('layouts.admin')

@section('content')
<div class="admin-container">
    <aside class="admin-sidebar">
        @include('admin.partials.sidebar')
    </aside>

    <main class="admin-content">
        <div class="content-header">
            <h2>Create New Order</h2>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Orders
            </a>
        </div>
        
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.orders.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="customer_name">Customer Name</label>
                        <input type="text" name="customer_name" id="customer_name" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="products">Products</label>
                        <select name="products[]" id="products" class="form-control select2" multiple required>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }} (LKR {{ number_format($product->price, 2) }})</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-success">Create Order</button>
                </form>
            </div>
        </div>
    </main>
</div>

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endpush
@endsection