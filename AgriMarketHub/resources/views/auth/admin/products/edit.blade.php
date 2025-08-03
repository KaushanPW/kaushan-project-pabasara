@extends('layouts.admin')

@section('content')
<div class="admin-container">
    <aside class="admin-sidebar">
        @include('admin.partials.sidebar')
    </aside>

    <main class="admin-content">
        <div class="content-header">
            <h2>Edit Product</h2>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Products
            </a>
        </div>
        
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
            </div>
            
            <div class="form-group">
                <label for="price">Price (LKR)</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
            </div>
            
            <div class="form-group">
                <label for="image">Product Image</label>
                @if($product->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/'.$product->image) }}" width="100" alt="Current Image">
                        <br>
                        <label class="mt-2">
                            <input type="checkbox" name="remove_image"> Remove current image
                        </label>
                    </div>
                @endif
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </main>
</div>
@endsection