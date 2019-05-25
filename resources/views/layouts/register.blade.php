<!DOCTYPE html>
<html lang="en">
<head>
    <title>Aplikasi Masak & Rancang</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="icon" href="images/core-img/favicon.ico">
    
</head>
<body>

    <div class="container">
        <div class="page-header">
            @yield('header')
        </div>
        @yield('content')
    </div>
</body>
</html>