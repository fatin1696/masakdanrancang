@extends('layouts.user')

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> </h2>

                <div class="pull-right">
<!-- 
                <a class="btn btn-primary" href="{{ route('home') }}"> Kembali</a> -->

        </div>


            </div>


            <div class="pull-right">
<!--             
                <a class="btn btn-success" href="{{ route('recipe.create') }}"> Tambah Resepi </a> -->

            </div>

        </div>

    </div>

   

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

    <div class ="row">
        <div class ="col-md-6">
        <!-- <h1>Senarai Resepi</h1> -->
    </div>

    
    <div class="col-md-4">
        <form action="{{ route('senarairesepi.search') }}" method="get" style="margin:auto;max-width:300px" class="example">
            <div class="input-group">
                <input type="search" name="search" class="form-control">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </span>
            </div>
        </form>
    </div>
   
    <table class="w3-table-all">
    <thead>
      <tr class=" w3-hover-red" >

        <th style="text-align:center" width="200px">Gambar</th>
        <th style="text-align:center" width="200px">Nama Resepi</th>
        <th style="text-align:center" width="200px">Kategori</th>
        <th style="text-align:center" width="200px">Pedas</th>
        <th style="text-align:center" width="280px">Action</th>
        </tr>

        @foreach ($recipes as $recipe)

        <tr class="w3-hover-blue">

        <td style="text-align:center">
        <img width="100" src="{{ asset('storage/'.$recipe->image) }}" alt=""></td>
        <td style="text-align:center">{{ $recipe->recipename }}</a></td>
        <td style="text-align:center">{{ $recipe->category }}</a></td>
        @php ($TRY = $recipe->pedas)
        @if ($TRY === "Sangat Pedas")
            <td style="text-align:center"><img src="{{ asset('images/5.png')}}" width="50" height="50"></a></td>
        @elseif ($TRY === "Pedas")
        <td style="text-align:center"><img src="{{ asset('images/4.png')}}" width="50" height="50"></a></td>
        @elseif ($TRY === "Sederhana")
        <td style="text-align:center"><img src="{{ asset('images/3.png')}}" width="50" height="50"></a></td>
        @elseif ($TRY === "Kurang Pedas")
        <td style="text-align:center"><img src="{{ asset('images/2.png')}}" width="50" height="50"></a></td>
        @else
        <td style="text-align:center"><img src="{{ asset('images/1.png')}}" width="50" height="50"></a></td>
        @endif
     

        <td style="text-align:center">

                
                    {{csrf_field()}}
                    <a class="btn btn-info" href="{{ route('jadualperancangan.create') }}">Rancang</a>
                    <a class="btn btn-primary" href="{{ route('senarairesepi.show',$recipe->id) }}">Lihat</a>
                   @csrf

                </form>

            </td>

        </tr>

        @endforeach

    </table>

  

    {!! $recipes->links() !!}

      

@endsection