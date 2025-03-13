<!DOCTYPE html>
<html>
<head>
    <title>employees List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" style="margin-left: 90%">Logout</button>
                    </form>
        <h1>employees List</h1>

        <table class="table table-bordered">
            <thead class="thead-green" style="background-color: aqua;">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>salary</th>
                    <th>Joined</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($employees->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center" style=" background-color: coral ;">No data found</td>
                    </tr>
                @else
                    @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->gender }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->salary }}</td>
                        <td>{{ $employee->created_at }}</td>
                        <td>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('employees.view', $employee->id) }}" class="btn btn-primary btn-sm">View</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>

                            <form action="{{ route('employees.notify', $employee->id) }}" method="GET" style="display:inline;">
                                @csrf
                           
                                <button type="submit" class="btn btn-warning btn-sm">send notification</button>
                            </form>
                            


                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <a href="{{ route('employees.create') }}" class="btn btn-success">Add employee</a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalLabel">Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            @if(session('success') || session('error'))
                $('#messageModal').modal('show');
            @endif
        });
    </script>
</body>
</html>