<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','laravel app')</title>
    @stack('css')
</head>
<body>
    @include('partials.nav')
    
    @yield('content')

    @stack('js')
    
    
</body>
</html>