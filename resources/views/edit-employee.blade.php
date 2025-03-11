<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
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
                <h2>Edit Employee</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $employee->name) }}" required maxlength="255" minlength="3">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $employee->email) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $employee->phone) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary:</label>
                        <input type="text" class="form-control" id="salary" name="salary" value="{{ old('salary', $employee->salary) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="skills">Skills:</label>
                        @php
                            $skills = old('skills', is_array($employee->skills) ? $employee->skills : explode(',', $employee->skills)) ?? [];
                        @endphp
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="java" name="skills[]" value="java" {{ in_array('java', $skills) ? 'checked' : '' }}>
                            <label class="form-check-label" for="java">Java</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="python" name="skills[]" value="python" {{ in_array('python', $skills) ? 'checked' : '' }}>
                            <label class="form-check-label" for="python">Python</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="sql" name="skills[]" value="sql" {{ in_array('sql', $skills) ? 'checked' : '' }}>
                            <label class="form-check-label" for="sql">SQL</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="php" name="skills[]" value="php" {{ in_array('php', $skills) ? 'checked' : '' }}>
                            <label class="form-check-label" for="php">PHP</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="c" name="skills[]" value="c" {{ in_array('c', $skills) ? 'checked' : '' }}>
                            <label class="form-check-label" for="c">C</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="cpp" name="skills[]" value="cpp" {{ in_array('cpp', $skills) ? 'checked' : '' }}>
                            <label class="form-check-label" for="cpp">C++</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="male" name="gender" value="male" {{ old('gender', $employee->gender) == 'male' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="female" name="gender" value="female" {{ old('gender', $employee->gender) == 'female' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="other" name="gender" value="other" {{ old('gender', $employee->gender) == 'other' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo:</label>
                        <input type="file" class="form-control-file" id="photo" name="photo">
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
                    <button type="submit" class="btn btn-primary">Update Employee</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
