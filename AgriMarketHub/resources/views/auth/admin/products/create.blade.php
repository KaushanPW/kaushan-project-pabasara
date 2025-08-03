@extends('layouts.admin')

@section('content')
<div class="admin-container">
    <aside class="admin-sidebar">
        @include('admin.partials.sidebar')
    </aside>

    <main class="admin-content">
        <div class="content-header">
            <h2>Add New Product</h2>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Products
            </a>
        </div>
        
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="price">Price (LKR)</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="image">Product Image</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            
            <button type="submit" class="btn btn-success">Save Product</button>
        </form>
    </main>
</div>
@endsection