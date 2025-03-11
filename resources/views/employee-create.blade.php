<!DOCTYPE html>
<html>
<head>
    <title>Create Employee</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 600px;
        }
        .form-control, .form-check-input, .form-control-file {
            max-width: 100%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Create Employee</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required maxlength="255" minlength="3">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary:</label>
                        <input type="text" class="form-control" id="salary" name="salary" value="{{ old('salary') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="skills">Skills:</label>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="java" name="skills[]" value="java">
                            <label class="form-check-label" for="java">Java</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="python" name="skills[]" value="python">
                            <label class="form-check-label" for="python">Python</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="sql" name="skills[]" value="sql">
                            <label class="form-check-label" for="sql">SQL</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="php" name="skills[]" value="php">
                            <label class="form-check-label" for="php">PHP</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="c" name="skills[]" value="c">
                            <label class="form-check-label" for="c">C</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="cpp" name="skills[]" value="cpp">
                            <label class="form-check-label" for="cpp">C++</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="male" name="gender" value="male" required>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline"></div>
                            <input type="radio" class="form-check-input" id="female" name="gender" value="female" required>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="other" name="gender" value="other" required>
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo:</label>
                        <input type="file" class="form-control-file" id="photo" name="photo" required>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        <script>
                            setTimeout(() => {
                              window.location.href = "{{ route('employees.index') }}";
                            }, 1000);
                        </script>
                    
                    @endif
                    
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>


                            @endforeach
                    <button type="submit" class="btn btn-primary">Create Employee</button>
                </form>
            </div>
        </div>
    </div>


</body>
</html>
