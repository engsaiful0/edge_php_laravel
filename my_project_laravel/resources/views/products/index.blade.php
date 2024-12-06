<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Products</h1>
    <a href="{{ route('products.create') }}">Add Product</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php
        echo 'Hello world';
        ?>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <!-- Display product image -->
                        @if ($product->image)
                            <img src="{{ asset($product->image) }}" alt="Product Image" width="100" height="100">
                        @else
                            No image available
                        @endif
                    </td>
                    <td>
                        <!-- Edit link -->
                        <a href="{{ route('products.edit', $product->id) }}">Edit</a>

                        <!-- Delete form -->
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>
@endsection
