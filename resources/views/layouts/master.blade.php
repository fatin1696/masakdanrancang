<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Masak Dan Rancang</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="icon" href="images/core-img/favicon.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    
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