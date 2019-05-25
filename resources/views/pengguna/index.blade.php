@extends('layouts.master')

@section('header')
    <h2>SENARAI PENGGUNA</h2>
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
            
                <!-- <a class="btn btn-success" href="{{ route('ingredient.create') }}"> Tambah Bahan Masakan </a> -->

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

        <th style="text-align:center">Nama Pengguna</th>

        <th style="text-align:center">Email </th>

        <th style="text-align:center">Tarikh Cipta Akaun </th>


        </tr>

        @foreach ($users as $user)

        <tr>

        <td style="text-align:center">{{ ++$i }}</td>

        <td style="text-align:center">{{ $user->name }}</a></td>
        <td style="text-align:center">{{ $user->email }}</a></td>
        <td style="text-align:center">{{ $user->created_at }}</a></td>

    

            </td>

        </tr>

        @endforeach

    </table>

  

    {!! $users->links() !!}

      

@endsection