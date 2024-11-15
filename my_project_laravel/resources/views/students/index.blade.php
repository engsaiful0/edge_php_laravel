<html>

<head>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    <a href="{{route('students.create')}}">Create Student</a>
    <table class="table table-bordered table-striped table-hover">
        @foreach($students as $student)
        <tr>
            <td>
                {{$student->name}}
            </td>
            <td>
                {{$student->address}}
            </td>
            <td>
                {{$student->mobile}}
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>