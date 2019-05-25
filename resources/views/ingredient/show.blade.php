@extends('layouts.master')


@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">


                <div class="panel-body">

                    <form action="{{ route('ingredient.store') }}" method="POST">

                        {{ csrf_field() }}

                    <div class="card">

                        <div class="container-fliud">

                            <div class="wrapper row">

                                <div class="preview col-md-6">

                                    

                                    <div class="preview-pic tab-content">

                                      <div class="tab-pane active" id="pic-1"><img src="{{ asset('images/ingredients.jpg')}}"width="500" height="300" /></div>

                                    </div>


                                </div>

                                <div class="details col-md-6">

                                <div class="form-group">

                                <strong> <label for="kategori">Nama Bahan : </label></strong>

                                     {{ $ingredient->ingredientname }}

                                </div>

                                <div class="form-group">

                                <strong>Gambar Bahan:</strong>
                                    <img width="150" src="{{ asset('storage/'.$ingredient->image) }}" alt="">


                                </div>


                            <div class="pull-right">

                                    <a class="btn btn-primary" href="{{ route('ingredient.index') }}"> Kembali</a>

                            </div>


                                </div>

                            </div>

                        </div>

                    </div>

                    </form>


                </div>

            </div>

        </div>

    </div>

</div>


<script type="text/javascript">

    $("#input-id").rating();

</script>

@endsection