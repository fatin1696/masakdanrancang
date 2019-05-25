<!DOCTYPE html>
<html lang="en">
<head>
  <title>Masak & Rancang | Home</title>
   <!-- Favicon -->
   <link rel="icon" href="images/core-img/favicon.ico">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" shrink-to-fit="no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Lobster&effect=brick-sign">
  
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <style>
.w3-allerta {
  font-family: "Allerta Stencil", Sans-serif;
}
</style>
</head>
<body>

<nav class="navbar navbar-inverse">
<a class="navbar-brand" >Masak & Rancang</a>
  <div class="container-fluid">
    <div class="navbar-header">
      
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="{{ route('home') }}"><span class="glyphicon glyphicon-home"></span>   Halaman Utama</a></li>
      <li><a href="{{ route('senarairesepi.index') }}"><span class="glyphicon glyphicon-list-alt"></span>  Senarai Resepi</a></li>
      <li><a href="{{ route('jadualperancangan.show') }}"><span class="glyphicon glyphicon-calendar"></span>  Jadual Perancangan</a></li>
      <li><a href="{{ route('grocerylist.show') }}"><span class="glyphicon glyphicon-shopping-cart"></span>   Senarai Beli</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li class="">
                                <a id="" class=""  role="button" data-toggle="" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="glyphicon glyphicon-user"></span>    {{ Auth::user()->name }} 
                                </a>
      <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <span class="glyphicon glyphicon-log-in"></span> Log Keluar</a></li>
                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
    </ul>
  </div>
</nav>

<div class="container">
     
        @yield('content')
    </div>
  

</body>
</html>

