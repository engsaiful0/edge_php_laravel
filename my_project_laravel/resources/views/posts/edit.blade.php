<!-- resources/views/products/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Product</h1>
        <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">Back to Products</a>

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control">{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" id="price" name="price" class="form-control" value="{{ $product->price }}" required>
            </div>

            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" class="form-control" value="{{ $product->stock }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>

    <!-- Local Bootstrap JS and dependencies -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @endsection