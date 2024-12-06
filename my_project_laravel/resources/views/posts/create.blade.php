<!-- resources/views/products/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Add Post</h1>
    <a href="{{ route('posts.index') }}">Back to Post</a>

    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td>Title</td>
                <td>
                    <input type="text" name="title" required>
                </td>
            </tr>
            <tr>
                <td>Content</td>
                <td>
                    <textarea name="content" required></textarea>
                </td>
            </tr>
         
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Save">
                </td>
            </tr>
        </table>
    </form>
@endsection
