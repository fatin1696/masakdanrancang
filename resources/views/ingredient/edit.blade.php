@extends('layouts.master')

@section('header')
    <h2>Edit Bahan</h2>
@stop

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> </h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('ingredient.index') }}"> Kembali</a>

            </div>

        </div>

    </div>

   

    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

  

    <form action="{{ route('ingredient.update', $ingredient->id) }}" method="post" enctype="multipart/form-data">
            <!-- <input type="hidden" name="_method" value="post"> -->
            @csrf
 
      
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                 <img src="{{ asset('images/ingredients.jpg')}}" class="card-img-top" alt="...">
             <div class="card-body">
              <h5 class="card-title"></h5>
    
             <div class="form-group">

                <strong>Nama Bahan:</strong>

                <input type="text" name="ingredientname" value="{{ $ingredient->ingredientname }}" class="form-control" placeholder="Nama Bahan">

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Gambar Bahan:</strong>
                <img width="150" src="{{ asset('storage/'.$ingredient->image) }}" alt="">
                <input type="file" name="image" class="form-control" placeholder="Gambar Bahan">
  <label class="custom-file-label" for="customFile">

            </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                    <button type="save" class="btn btn-primary">Edit</button>

            </div>
    

   

    </form>

@endsection