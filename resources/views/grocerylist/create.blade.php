@extends('layouts.user') 

@section('content')

  <body>
    <div class="container">
      <br/>

      <form action="{{ route('grocerylist.store') }}" enctype="multipart/form-data" method="POST" >
        @csrf
        <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
        <label for="recipe"><strong>Nama Bahan<span class="required">*</span></label>
        <select name="ingredientname" id="ingredientname" class="form-control" placeholder="Nama Bahan">
        <option value="" disabled selected>Pilih Nama Bahan</option>
        @foreach ($ingredients as $ingredient)
        <option value="{{ $ingredient->ingredientname }}">{{  $ingredient->ingredientname  }}</option>
        @endforeach    
        </select>        
    </div>
    </div>
    
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <strong> Kuantiti : </strong>  
            <input type="text" name="quantity" class="form-control" placeholder="Nama Kategori">  
         </div>
        </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <strong> Tarikh : </strong>  
            <input class="date form-control"  type="date" id="tarikh" name="tarikh">   
         </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-success">Tambah Senarai Beli</button>
          </div>
        </div>
      </form>
    </div>
    <script type="text/javascript">  
        $('#startdate').datepicker({ 
            autoclose: true,   
            format: 'yyyy-mm-dd'  
         });
         $('#enddate').datepicker({ 
            autoclose: true,   
            format: 'yyyy-mm-dd'
         }); 
    </script>
  </body>
</html>
@endsection