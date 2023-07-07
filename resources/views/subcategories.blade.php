@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/assets/css/subcategory.css" />
     <link rel="stylesheet" href="/assets/css/app.css" />
@endpush

@section('content')
    <div class="big">
        <!-------container-->
        <div class="imgcontainer" style="background-image: url('/assets/images/{{$category->img}}');">
            <div class="paradogs">
            <h1>{{$category->name}}</h1>
        </div>

       <section class="four_div">
            @foreach($subCategories as $subcategory)
            <div class="all" id="iss" style="background-image: url('/assets/images/{{$subcategory->img}}');" onclick="function1('{{$subcategory->id}}')">
              <input type="hidden" name="desc{{$subcategory->id}}" id="desc{{$subcategory->id}}"  value="{{$subcategory->description}}">
              <input type="hidden" name="img{{$subcategory->id}}" id="img{{$subcategory->id}}" value="{{$subcategory->img}}">

                <h2><span> {{$subcategory->name}}</span></h2>
            </div>
            @endforeach

        </section>
    </div>

<!-- overlayyyyyyyyyyyyy1111111111 -->

<div id="exit">
  <section id="game" class="clear">
    <section class="two_div">
      <div class="bacc" id="bacc"></div>
      <div class="icons"> <img src="/assets/images/exit.svg" id="closee"></div>
    </section>

    <div class="city">
      <h1>Description</h1>
      <p id="desc"></p>
    </div>

  </section>    
</div>

    @endsection

    @push('scripts')
<script src="/assets/js/subcategory.js"></script>

@endpush
