<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card">
            <div class="card-header">
                <h1>Employee Details</h1>
            </div>

            <div class="text-center mt-3">
                <img src="{{ asset('photos/' . $employee->photo) }}" class="rounded" alt="Employee Photo" style="width: 150px; height: 150px;">
            </div>
            <div class="card-body">
                <h5 class="card-title">ID: {{ $employee->id }}</h5>
                <p class="card-text"><strong>Name:</strong> {{ $employee->name }}</p>
                <p class="card-text"><strong>Gender:</strong> {{ $employee->gender }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $employee->email }}</p>
                <p class="card-text"><strong>Contact:</strong> {{ $employee->phone }}</p>
                <p class="card-text"><strong>Salary:</strong> {{ $employee->salary }}</p>
                <p class="card-text"><strong>Skills:</strong></p>
                <ul>
                    @foreach(json_decode($employee->skills) as $skill)
                        <li>{{ $skill }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="card-footer">
                <a href="{{ route('employees.index') }}" class="btn btn-success">Go Back</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
