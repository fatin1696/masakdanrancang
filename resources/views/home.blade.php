@extends('layouts.user')

@section('content')

<div class="group-home-slideshow">
  <div class="home-slideshow-inner ">
    <div class="home-slideshow">
      <div id="home_main-slider" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            @foreach($sliders as $image)
                <li data-target="#home_main-slider" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner" >
          @foreach($sliders as $slider)
          <div class="item image {{ $loop->first ? ' active' : '' }}">
            <img src="{{ asset('storage/'.$slider->image) }}" style="width:100%; height: 400px !important;" class="d-block mx-auto" alt="Responsive image" title="Image Slideshow">
            <div class="carousel-caption d-none d-md-block; h-25 d-inline-block;text-dark" style="width: 200px; background-color: rgba(7,7,7)">
              <div class="slide-caption">
                <div class="group-caption">
                  <div class="content">
                    @if(!empty($slider->descriptions))
                    <span class="title">
                      {{$slider->descriptions}}
                    </span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <a class="left carousel-control" href="#home_main-slider" data-slide="prev">
          <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#home_main-slider" data-slide="next">
          <span class="icon-next"></span>
        </a>
      </div>
    </div>
  </div>
</div>


<br>
<br/>
<br><table class="w3-table" style="background-color: #c5e2ee;" >
@php ($TRY= 1)
<tr>
@foreach ($categories as $aaaa)

      
      <th style="background-color:#68a8ad; text-align:center; " width="50">
      {{csrf_field()}}  
      <br><a  class="w3-button" href="{{ route('home.show',$aaaa->id) }}"><img src="{{ asset('storage/'.$aaaa->image) }}"class="card-img-top" alt="..." width="300" height="200"></a>
      @csrf
      <div class="w3-container w3-black w3-center w3-allerta">
      <p class="w3-xlarge"><dt>{{ $aaaa->categoryname }}</dt></p>
      </div>
      <p style="font-family:courier;">{{ $aaaa->description }}</p>                                  
   <th>
      @php ($TRY++)
    @if ($TRY === 4)
    </th>
      </tr>
      <td>
      <tr>
      @php ($TRY= 1)
      @endif
      
    @endforeach
    </tr>



@endsection

