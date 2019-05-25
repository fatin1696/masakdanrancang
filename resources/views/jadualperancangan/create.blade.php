@extends('layouts.user') 

@section('content')

  <body>
    <div class="container">
      <br/>

      <form action="{{ route('jadualperancangan.store') }}" enctype="multipart/form-data" method="POST" >
        @csrf
        <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
        <label for="recipe"><strong>Nama Resepi<span class="required">*</span></label>
        <select name="recipename" id="recipename" class="form-control" placeholder="Nama Resepi">
        <option value="" disabled selected>Pilih Senarai Resepi</option>
        @foreach ($recipes as $recipe)
        <option value="{{ $recipe->recipename }}">{{  $recipe->recipename }}</option>
        @endforeach    
        </select>        
    </div>
    </div>

        <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
        <label for="mealtime"><strong>Masa Makan<span class="required">*</span></label>
        <select name="mealtime" id="mealtime" class="form-control" placeholder="Masa Makan">
        <option value="" disabled selected>Masa Makan</option>
        <option value="Sarapan">Sarapan</option>
        <option value="Makan Tengahari">Makan Tengahari</option>
        <option value="Minum Petang">Minum Petang</option>
        <option value="Makan Malam">Makan Malam</option>
        </select>         
        </div>
        </div>       
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
            <button type="submit" class="btn btn-success">Tambah Perancangan</button>
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