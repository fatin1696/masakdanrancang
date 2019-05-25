@extends('layouts.master')
@section('header')
    <h2>LAPORAN JUMLAH PENGGUNA</h2>
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


    </div>

</div>

</div>



@if ($message = Session::get('success'))

<div class="alert alert-success">

    <p>{{ $message }}</p>

</div>

@endif
    <body>
    <br><div id="app">
            {!! $chart->container() !!}
        </div>
        <script src="https://unpkg.com/vue"></script>

        
        <script>
            var app = new Vue({
                el: '#app',
            });
        </script>
        <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
        {!! $chart->script() !!}
    </body>
</html>

@endsection

