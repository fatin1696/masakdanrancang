@extends('layouts.master')


@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">


                <div class="panel-body">

                    <form action="{{ route('recipe.store') }}" method="POST">

                        {{ csrf_field() }}

                    <div class="card">

                        <div class="container-fliud">

                            <div class="wrapper row">

                                <div class="preview col-md-6">                            
                                    <div class="preview-pic tab-content">

                                      <div class="tab-pane active" id="pic-1"><img width="500" src="{{ asset('storage/'.$recipe->image) }}" alt=""></div>

                                    </div>


                                </div>

                                <div class="details col-md-6">

                                <div class="form-group">
                                <strong> <label for="kategori">Nama Resepi : </label></strong>
                                     {{ $recipe->recipename }}
                                </div>

                                <div class="form-group">
                                <strong> <label for="kategori">Kategori : </label></strong>
                                     {{ $recipe->category }}
                                </div>

                                <div class="form-group">
                                <strong> <label for="kategori">Masa Penyediaan : </label></strong>
                                     {{ $recipe->preparetime }}
                                </div>

                                <div class="form-group">
                                <strong> <label for="kategori">Jumlah Hidangan : </label></strong>
                                     {{ $recipe->serves }}
                                </div>
                                
                                <div class="form-group">
                                <strong> <label for="kategori">Tahap Kepedasan : </label></strong>
                                     {{ $recipe->pedas }}
                                </div>
                               
                                <div class="form-group">
                                <strong> <label for="kategori">Arahan : </label></strong>
                                {!! nl2br(e( $recipe->directions)) !!}
                            
                                </div>

                                
                                <div class="form-group">
                                <strong> <label for="kategori">Bahan-Bahan : </label></strong>
                                    {!! nl2br(e( $recipe->ingredients)) !!}
                                </div>

                                <div class="form-group">
                               </div>


                            <!-- <div class="pull-right">

                                    <a class="btn btn-primary" href="{{ route('recipe.index') }}"> Kembali</a>

                            </div> -->


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


@endsection