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

    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td>Product Name</td>
                <td>
                    <input type="text" name="name" required>
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td>
                    <textarea name="description" required></textarea>
                </td>
            </tr>
            <tr>
                <td>Price</td>
                <td>
                    <input type="text" name="price" required>
                </td>
            </tr>
            <tr>
                <td>Stock</td>
                <td>
                    <input type="text" name="stock" required>
                </td>
            </tr>
            <tr>
                <td>Product Image</td>
                <td>
                    <input type="file" name="image" accept="image/*" required>
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
</body>

</html>