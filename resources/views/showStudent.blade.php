<!DOCTYPE html>
<html>
<head>
    <title>Students List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Students List</h1>
        <table class="table table-bordered">
            <thead class="thead-dark"></thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->address }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ route('students.view',$student->id) }}" class="btn btn-primary btn-sm">View</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('students.create') }}" class="btn btn-success">Add Student</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>