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
@foreach ($grocerylists as $grocerylist)

      
      <th  width="300">
      {{csrf_field()}}  
      <div class="w3-container">
      <div class="w3-panel w3-khaki w3-topbar w3-bottombar w3-border-amber">
      <br><p style="font-family:courier;"><i class = "glyphicon glyphicon-calendar"></i>  {{ $grocerylist->tarikh}}</p>
      <p style="font-family:courier;"><i class="glyphicon glyphicon-barcode"></i>   {{ $grocerylist->ingredientname}}</p>
      <p style="font-family:courier;"><i class = "glyphicon glyphicon-pushpin"></i>   {{ $grocerylist->quantity}}</p>

    
      <form action="{{ route('grocerylist.destroy',$grocerylist->id) }}" method="POST" >
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <br><button style=" text-align:center; " class='btn btn-default' type='submit' value='submit'>
      <i class="glyphicon glyphicon-trash"></i>
</button>
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
<a class="w3-button w3-xlarge w3-circle w3-black" href="{{ route('grocerylist.create') }}">+</a>


</div>
</div>


</body>
</html>

@endsection