<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register.submit') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Confirm Password</label>
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success" role="alert" id="success-message">
                                    {{ session('success') }}
                                </div>
                                <script>
                                    setTimeout(function() {
                                        document.getElementById('success-message').style.display = 'none';
                                        window.location.href = "{{ route('login') }}";
                                    }, 1000);
                                </script>
                            @endif
                            
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert" id="error-message">
                                    {{ session('error') }}
                                </div>
                                <script>
                                    setTimeout(function() {
                                        document.getElementById('error-message').style.display = 'none';
                                    }, 1000);
                                </script>
                            @endif
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>