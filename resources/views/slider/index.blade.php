@extends('layouts.master')

@section('header')
    <h2>SLIDER</h2>
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
            
                <a class="btn btn-success" href="{{ route('slider.create') }}"> Tambah Gambar Slider </a>

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

        <th style="text-align:center">Keterangan</th>

        <th style="text-align:center">Gambar </th>

        <th style="text-align:center" width="280px">Action</th>

        </tr>

        @foreach ($sliders as $slider)

        <tr>

        <td style="text-align:center">{{ ++$i }}</td>

        <td style="text-align:center">{{ $slider->descriptions }}</a></td>

        <td style="text-align:center">{{ $slider->gambar }}
        <img width="100" src="{{ asset('storage/'.$slider->image) }}" alt=""></td>

        <td style="text-align:center">

                <form action="{{ route('slider.destroy',$slider->id) }}" method="POST" >
                    {{csrf_field()}}
                    {{method_field('DELETE')}}

                    <button type="submit" class="btn btn-danger">Padam</button> 

                    <a class="btn btn-primary" href="{{ route('slider.edit',$slider->id) }}">Kemaskini</a>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

  

    {!! $sliders->links() !!}

      

@endsection