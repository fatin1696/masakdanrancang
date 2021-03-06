@extends('layouts.master')

@section('header')
    <h2>RESEPI</h2>
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
            
                <a class="btn btn-success" href="{{ route('recipe.create') }}"> Tambah Resepi </a>

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

        <th style="text-align:center">No</th>
        <th style="text-align:center">Nama Resepi</th>
        <th style="text-align:center">Kategori</th>
        <!-- <th style="text-align:center">Masa</th>
        <th style="text-align:center">Hidangan</th>
        <th style="text-align:center">Bahan</th> -->
        <th style="text-align:center">Pedas</th>
        <!-- <th style="text-align:center" width="200px">Arahan</th> -->
        <th style="text-align:center" width="200px">Gambar</th>

        <th style="text-align:center" width="280px">Action</th>

        </tr>

        @foreach ($recipes as $recipe)

        <tr>

        <td style="text-align:center">{{ ++$i }}</td>

        <td style="text-align:center">{{ $recipe->recipename }}</a></td>
        <td style="text-align:center">{{ $recipe->category }}</a></td>
        @php ($TRY = $recipe->pedas)
        @if ($TRY === "Sangat Pedas")
            <td style="text-align:center"><img src="{{ asset('images/5.png')}}" width="100" height="100"></a></td>
        @elseif ($TRY === "Pedas")
        <td style="text-align:center"><img src="{{ asset('images/4.png')}}" width="100" height="100"></a></td>
        @elseif ($TRY === "Sederhana")
        <td style="text-align:center"><img src="{{ asset('images/3.png')}}" width="100" height="100"></a></td>
        @elseif ($TRY === "Kurang Pedas")
        <td style="text-align:center"><img src="{{ asset('images/2.png')}}" width="100" height="100"></a></td>
        @else
        <td style="text-align:center"><img src="{{ asset('images/1.png')}}" width="100" height="100"></a></td>
        @endif
        <td style="text-align:center">{{ $recipe->gambar }}
        <img width="100" src="{{ asset('storage/'.$recipe->image) }}" alt=""></td>

        <td style="text-align:center">

                <form action="{{ route('recipe.destroy',$recipe->id) }}" method="POST" >
                    {{csrf_field()}}
                    {{method_field('DELETE')}}

                    <button type="submit" class="btn btn-danger">Padam</button> 
                    <a class="btn btn-info" href="{{ route('recipe.show',$recipe->id) }}">Lihat</a>
                    <a class="btn btn-primary" href="{{ route('recipe.edit',$recipe->id) }}">Kemaskini</a>
                   @csrf

                </form>

            </td>

        </tr>

        @endforeach

    </table>

    {!! $recipes->links() !!}    

@endsection