@extends('layouts.master')

@section('header')
    <h2>EDIT RESEPI</h2>
@stop
  

@section('content')


<body background="background.jpg"></body>
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>  </h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('recipe.index') }}"> Kembali</a>

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

   

<form action="{{ route('recipe.update', $recipe->id) }}"  enctype="multipart/form-data" method="POST" >

    @csrf

    <div class="card mb-3">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <img src="{{ asset('images/ingredients.jpg')}}" class="card-img-top" alt="...">
    <div class="card-body">
    <h5 class="card-title"></h5>

    <form>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="kategori"><strong>Nama Resepi<span class="required">*</span></label>
        <input type="text" name="recipename" value="{{ $recipe->recipename }}" class="form-control" placeholder="Nama Resepi">
    </div>

    <div class="form-group col-md-6">
    <div class="col-sm-3">

        <label for="kategori"><strong>Kategori<span class="required">*</span></label>
        <select name="category" id="category" class="form-control" placeholder="Kategori">
        <option value="" disabled selected>Kategori</option>
        @foreach ($categories as $category)
        <option value="{{ $category->categoryname }}">{{ $category->categoryname }}</option>
        @endforeach
    
        </select> 
        
    </div>
    </div>

    <div class="form-group col-md-6">
            <label for="kategori"><strong>Masa Penyediaan<span class="required">*</span></label>
            <input type="text" name="preparetime" value="{{ $recipe->preparetime }}" class="form-control" placeholder="Masa">            
    </div>

    <div class="form-group col-md-6">
            <label for="kategori"><strong>Jumlah Hidangan<span class="required">*</span></label>       
            <input type="text" class="form-control" value="{{ $recipe->serves }}" placeholder="Hidangan" name="serves">
    </div>

    <div class="form-group">
            <strong>Bahan:</strong>
            <textarea type="text" class="form-control form-description"  placeholder="Bahan-Bahan" name="ingredients" >{{$recipe->ingredients}}</textarea>            
    </div>

    <div class="form-group">
            <strong>Arahan:</strong>
            <textarea type="text" class="form-control form-description"  placeholder="Arahan" name="directions" >{{ $recipe->directions }}</textarea>
    </div>

    <div class="form-group col-md-6">
        <label for="tahap kepedasan"><strong>Tahap Kepedasan<span class="required">*</span></label>
        <select name="pedas" id="pedas" class="form-control" placeholder="Pedas">
        <option value="" disabled selected>Tahap Kepedasan</option>
        <option value="{{ $recipe->pedas }}">Tak Pedas</option>
        <option value="Kurang Pedas">Kurang Pedas</option>
        <option value="Sederhana">Sederhana</option>
        <option value="Pedas">Pedas</option>
        <option value="Sangat Pedas">Sangat Pedas</option>
        </select>        
    </div>
    </div>
        
    <div class="form-group col-md-6">
        <div class="custom-file">
            <label for="kategori"><strong>Gambar Resepi<span class="required">*</span></label>
            <input type="file" name="image" class="form-control" value="{{ $recipe->image }}" placeholder="Gambar Bahan">
        </div>
    </div>
    
    <div class="form-group" >
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="save" class="btn btn-primary">Tambah</button>
        </div>
    </div>

</div>

</form>

@endsection