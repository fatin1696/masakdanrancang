@extends('layouts.master')

@section('header')
    <h2>KATEGORI MASAKAN</h2>
@stop
 

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> </h2>

                <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('admin.dashboard') }}"> Kembali</a>

        </div>


            </div>


            <div class="pull-right">
            
                <a class="btn btn-success" href="{{ route('category.create') }}"> Tambah Kategori </a>

            </div>

        </div>

    </div>

   

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

   

    <table class="table table-bordered" style="margin-top: 10px;">

        <tr>

        <th class="text-center">No</th>

        <th class="text-center">Nama Kategori</th>

        <th class="text-center">Gambar </th>

        <th class="text-center" width="280px">Action</th>

        </tr>

        @foreach ($categories as $category)

        <tr>

        <td style="text-align:center">{{ ++$i }}</td>

        <td style="text-align:center">{{ $category->categoryname }}</td>

        <td style="text-align:center">{{ $category->images }}
        <img width="100" src="{{ asset('storage/'.$category->image) }}" alt=""></td>

        <td style="text-align:center">
        <form action="{{ route('category.destroy',$category->id) }}" method="POST" >
                    {{csrf_field()}}
                    {{method_field('DELETE')}}

                    <button type="submit" class="btn btn-danger">Padam</button> 

                    <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Kemaskini</a>

                    @csrf

                </form>

            </td>

        </tr>

        @endforeach

    </table>

  

    {!! $categories->links() !!}

      

@endsection