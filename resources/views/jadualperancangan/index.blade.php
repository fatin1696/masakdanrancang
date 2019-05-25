@extends('layouts.user') 

@section('content')

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif


    <table class="w3-table" style="background-color: #c5e2ee;" >
@php ($TRY= 1)
<tr>
@foreach ($manages as $manage)


      
      <th  width="300">
      {{csrf_field()}}  
      <div class="w3-container">
      <div class="w3-panel w3-pale-green w3-bottombar w3-border-green w3-border">
      <br><p style="font-family:courier;"><i class="glyphicon glyphicon-tasks"></i>   {{ $manage->recipename}}</p>
      <p style="font-family:courier;"><i class = "glyphicon glyphicon-time"></i>   {{$manage->mealtime}}</p>
      <p style="font-family:courier;"><i class = "glyphicon glyphicon-calendar"></i>  {{ $manage->tarikh}}</p>
    
      <form action="{{ route('jadualperancangan.destroy',$manage->id) }}" method="POST" >
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <br><button style=" text-align:center; " class='btn btn-default' type='submit' value='submit'>
      <i class="glyphicon glyphicon-trash"></i>
      </button>
   
      <a class="btn btn-default" href="{{ route('jadualperancangan.showrecipe',$manage->id) }}"> 
      <i class="glyphicon glyphicon-eye-open"></i></a>

      <br>
      <br/>

      </div>
    </div>

    
   <th>
      @php ($TRY++)
    @if ($TRY === 4)
    </th>
      </tr>
      <td>
      <tr>
      @php ($TRY= 1)
      @endif
      

    @endforeach
    </tr>

    

<div class="w3-display-bottomright">
<div class="w3-container">
<a class="w3-button w3-xlarge w3-circle w3-black" href="{{ route('jadualperancangan.create') }}">+</a>


</div>
</div>


</body>
</html>

@endsection