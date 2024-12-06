<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}">Add Post</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Contnet</th>
             
                <th>Actions</th>
            </tr>
        </thead>
      
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    
                    <td>
                        <!-- Edit link -->
                        <a href="{{ route('posts.edit', $post->id) }}">Edit</a>

                        <!-- Delete form -->
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
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
   
@endsection
