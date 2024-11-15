<!-- resources/views/products/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body class="antialiased">
    <h1>Add Product</h1>
    <a href="{{ route('products.index') }}">Back to Products</a>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="name">Name:</label></td>
                <td><input type="text" id="name" name="name" required></td>
            </tr>
            <tr>
                <td><label for="description">Description:</label></td>
                <td><textarea id="description" name="description"></textarea></td>
            </tr>
            <tr>
                <td><label for="price">Price:</label></td>
                <td><input type="number" step="0.01" id="price" name="price" required></td>
            </tr>
            <tr>
                <td><label for="stock">Stock:</label></td>
                <td><input type="number" id="stock" name="stock" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Add Product</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
