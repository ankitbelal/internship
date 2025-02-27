<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5"></div>
        <div class="card"></div>
            <div class="card-header">
                <h1>Student Details</h1>
            </div>
            <div class="card-body">
                <h5 class="card-title">ID: {{ $student->id }}</h5>
                <p class="card-text"><strong>Name:</strong> {{ $student->name }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $student->email }}</p>
                <p class="card-text"><strong>contact:</strong> {{ $student->phone }}</p>
                <p class="card-text"><strong>Address:</strong> {{ $student->address }}</p>
            </div>
            <div class="card-footer">
            <a href="{{ route('students.index') }}" class="btn btn-success">go back</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html></div>