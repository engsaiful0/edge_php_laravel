<html>

<body>
    <form method="post" action="{{route('students.store')}}">
        @csrf
        <table>
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="name">
                </td>
            </tr>
            <tr>
                <td>Address</td>
                <td>
                    <textarea type="text" name="address"></textarea>
                </td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td>
                    <input type="text" name="mobile">
                </td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td>
                    <input type="submit" value="Save" name="submit">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>