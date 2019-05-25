@extends('layouts.admindashboard')

@section('content')

<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
<style>
.w3-allerta {
  font-family: "Allerta Stencil", Sans-serif;
}
</style>
<body>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<img src="{{ asset('images/logo.png')}}" width="450" height="400"  ></a>

<div class="w3-container w3-black w3-center w3-allerta">
  <p class="w3-xxxlarge">SELAMAT DATANG KE ADMIN PANEL</p>
  <p class="w3-xxxlarge">MASAK DAN RANCANG</p>
</div>

</body>
</html> 
@endsection

