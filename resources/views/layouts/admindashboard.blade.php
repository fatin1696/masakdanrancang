<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" shrink-to-fit="no">
 
        <title>Selamat Datang ke Admin Panel Masak Dan Rancang</title>
           <!-- Favicon -->
   <link rel="icon" href="images/core-img/favicon.ico">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
</head>
<body>
    <div id="app">
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark" >

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Halaman Utama <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('ingredient.index') }}" type="button" class="btn btn-default">Bahan Masakan</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('recipe.index') }}" type="button" class="btn btn-default" >Resepi</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('category.index') }}" type="button" class="btn btn-default" >Kategori</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('slider.index') }}" type="button" class="btn btn-default" >Slider</a>
      </li>

      <li class="nav-item">
        <a class="nav-link"  href="{{ route('laporan.index') }}" type="button" class="btn btn-default" >Laporan</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('pengguna.index') }}" type="button" class="btn btn-default" >Pengguna</a>
      </li>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Log Keluar') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
