@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" href="/assets/css/category.css" />
  <link rel="stylesheet" href="/assets/css/app.css" />
@endpush

@section('content')

    <div class="row" >
      <div class="arrow arrow-left" style="display: none">
        <i class="fas fa-chevron-circle-left"></i>
      </div>
      <img src="/assets/images/subcategories/dog3.jpg" alt="" style="height:750px;"/>
      <img
        src="/assets/images/subcategories/cat5.png"
        alt="" style="height:750px;"
      />
      <img src="/assets/images/subcategories/fish2.jpg" alt="" style="height:750px;"/>
      <div class="arrow arrow-right" style="display: none">
        <i class="fas fa-chevron-circle-right"></i>
      </div>
      <div class="dots">
        <div class="dot">
          <i class="far fa-dot-circle"></i>
        </div>
        <div class="dot">
          <i class="far fa-circle"></i>
        </div>
        <div class="dot">
          <i class="far fa-circle"></i>
        </div>
      </div>
    </div>

    <!-- centerrrrrrrrrrrrrrrrrrrrr -->
    <section class="center">
      <h1>KNOW WHAT TYPE OF <span>PETS</span> YOU WANT</h1>

      <section class="four_div">

        @foreach($categories as $category)
          <a href="{{route('subcategories',$category->id)}}" class="all" style="background-image: url('/assets/images/{{$category->img}}');">
            <h2><span> {{$category->name}}</span></h2>
          </a>
        @endforeach

      </section>
    </section>

    @endsection


@push('scripts')
<script src="/assets/js/category.js"></script>

@endpush
