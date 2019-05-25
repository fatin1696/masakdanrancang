@extends('layouts.master')

@section('header')
    <h2>TAMBAH KATEGORI MASAKAN</h2>
@stop
  

@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>  </h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('category.index') }}"> Kembali</a>

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

   

<form action="{{ route('category.store') }}" enctype="multipart/form-data" method="POST" >

    @csrf


    <div class="card mb-3">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <img src="{{ asset('images/category.jpg')}}" class="card-img-top" alt="...">
    <div class="card-body">
    <h5 class="card-title"></h5>
    
    <div class="form-group">

        <strong>Nama Kategori:</strong>

        <input type="text" name="categoryname" class="form-control" placeholder="Nama Kategori">

    </div>

    <div class="form-group">
            <strong>Keterangan:</strong>
            <textarea type="text" class="form-control form-description" placeholder="Keterangan" name="description" ></textarea>

    </div>

    <div class="custom-file">
        <strong>Gambar Bahan:</strong>
        <input type="file" name="image" class="form-control" placeholder="Gambar Bahan">
        <label class="custom-file-label" for="customFile"></label>
    </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

        <button type="save" class="btn btn-primary">Tambah</button>

    </div>
    

    </div>

</form>

@endsection