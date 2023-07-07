@php
  $categories=App\Models\Category::all();
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<title>Pet Care</title>
<title>profile</title>
    <meta charset="UTF-8" />
    <meta name="description" content="Project1 " />
    <link rel="icon" href="/assets/images/logo.png.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/assets/css/app.css" />
    <link rel="stylesheet" href="/assets/css/shopHome.css" />

    <link href="https://fonts.cdnfonts.com/css/alba-super" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
      integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    @stack('styles')

    <style>
      @import url("https://fonts.cdnfonts.com/css/alba-super");
    </style>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Fonts -->
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<!DOCTYPE html>
<html>

  <body>



    <div class="header">
      <section>
        <form id="search" class="d-flex" method="GET" action="{{route('products')}}">
           <spam onclick="search.submit();"><i class='fa-solid fa-magnifying-glass fa-2x icon' id="cona"></i></spam>
          <input class="form-control me-2" type="search" name="search" />
        </form>
      </section>
      <div class="natfi1">

      @if (Auth::user())

      <ul class="nav-links">
        <div class="menu">
          @if (Auth::user()->type=='Trader')
            <li><a href="{{ route('product.myProducts') }}" class="dropdown-item" > <i class="fa-solid fa-bag-shopping"> </i> My Products</a></li>
            <li><a href="{{ route('product.create') }}" class="dropdown-item" > <i class="fa-solid fa-plus"> </i> Add Product</a></li>
          @elseif (Auth::user()->type=='Vet')
            <li><a href="{{ route('booking.vetBooking') }}" class="dropdown-item" > <i class="fa-solid fa-syringe">  </i> Vet Booking</a></li>
          @endif
            <li><a href="{{ route('booking.myBooking') }}" class="dropdown-item" > <i class="fa-solid fa-syringe">  </i> My Booking</a></li>

            <li><a href="{{ route('cart') }}" class="dropdown-item" > <i class="fa-solid fa-cart-shopping"> </i> My Cart</a></li>



            <div class="dropdown">
              <button class="btn btn-lg btn-warning" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                <i class="fa-solid fa-bell" id="notif1"> {{count(Auth::user()->notifications)}}</i>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="message">

              @foreach(Auth::user()->notifications as $notification)
                <a class="dropdown-item" href="{{$notification->type}}" id="message1"  >{{$notification->notification}}</a>
              @endforeach
              </div>
          </div>

          <li class=" btnlogout ">
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
              </a>
            </li>

        </div>

      </ul>



        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      @else
      <ul class="nav-links">
        <div class="menu">
          <li><a href="{{ route('login') }}" class="dropdown-item" > Login</a></li>
          <li><a href="{{ route('register') }}" class="dropdown-item" > Signup</a></li>
        </div>
      </ul>
      @endif
      </div>






    </div>
    <!-- linkat-->
    <div class="main">
      <div class="main1">
      <img src="/assets/images/logo.png.svg">
        <p>Pet <span>Care</span></p>
      </div>

      <div class="main2">
        <ul>
            <li><a href="{{route('welcome')}}">Home</a></li>
            <li><a href="{{route('products')}}" id="shopjs">Shop</a>


          <!--  start menu-->
          <div class="megameu" id="megajs">
                @foreach($categories as $category)
                  <ul class="links">
                    <li><span>{{$category->name}}</span></li>
                    <li> <a href="{{route('products', ['category'=>$category->id, 'type'=>'pet'])}}"> Pet</a> </li>
                    <li> <a href="{{route('products', ['category'=>$category->id, 'type'=>'food'])}}"> Food</a></a></li>
                    <li> <a href="{{route('products', ['category'=>$category->id, 'type'=>'accessories'])}}"> Accessories</a> </li>
                    <li> <a href="{{route('products', ['category'=>$category->id, 'type'=>'treatment'])}}"> Treatment</a> </li>
                  </ul>
                @endforeach
          </div>
                <!-- end menue-->
          </li>
            <li><a href="{{route('categories')}}">Category</a></li>
            <li><a href="{{route('vets')}}">Doctor</a></li>
            <li><a href="{{route('service')}}">Diagnosis</a></li>
            <li><a href="{{route('about')}}">About</a></li>
            @if (Auth::user())
              <li><a href="{{route('home')}}">Profile</a></li>
            @endif
          </ul>
      </div>
    </div>


            @yield('content')

    <!-----Footer-->
<div class="mainfooter">
    <div class="footer">
        <div class="footer1">
            <h2> Pet Care</h2>
            <div class="heorozaintal"> </div>
            <p> A website for people who intersted in pets, you can find all what you need (pets , food ,accessories and medicine )</p>
        </div>
        <div class="footer2">
            <h2> Quick links</h2>
            <div class="heorozaintal"> </div>
            <ul>
                <li> <a href="{{route('welcome')}}">Home</a></li>
                <li><a href="{{route('products')}}">Shop</a></li>
                <li> <a href="{{route('categories')}}">Category</a></li>
                <li> <a href="{{route('vets')}}">Doctor</a></li>
                <li> <a href="{{route('service')}}">Diagnosis</a></li>
                <li> <a href="{{route('about')}}">About</a></li>

            </ul>
        </div>
        <div class="footer3">
            <h2> Have a Question?</h2>
            <div class="heorozaintal"> </div>
            <p>  203 Fake St. Mansoura, El-Dakahlia, Egypt</p>
            <p> +20 1234567890</p>
            <p> info@yourdomain.com</p>
        </div>

    </div>
    <div class="footer4">
        <h2> Copyright © 2023 All rights reserved</h2>
    </div>

</div>

<!-- end fooooter -->


  @stack('scripts')

  </body>
  <script>
    var shop=document.getElementById("shopjs");
     var mega=document.getElementById("megajs");

shop.addEventListener("click", () => {
mega.style.display="flex"
});

setInterval( shop.addEventListener("mouseover", () => {
mega.style.display="flex"
})
    , 1000);




</script>


</html>
