@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" href="/assets/css/userHome.css" />
  <link rel="stylesheet" href="/assets/css/app.css" />
@endpush

@section('content')



    <!--   image cener home-->
    <div class="main3">
      <div class="textphoto">
        <p>Best Pets you'll Love</p>
      </div>
    </div>
    <!---shop-->
    <h2 class="main-title"><a href="{{route('products')}}">Shop</a></h2>

    <!-- shop-->
    <div class="row shoop">
      @foreach($products as $product)
        <div class="one col-sm-2 ">
          <img src="/assets/images/{{$product->img}} " alt="not found" />
          <p>{{$product->name}}</p>
          <h1>{{$product->price}} LE</h1>
        </div>
      @endforeach
  </div>








    <!-- enddddddddddddd shooooooooooppppppppppppppppppppppppppppppppp -->

    <h2 class="main-title"><a href="{{route('categories')}}">Category</a></h2>

    <!-- catogroe-->
    <div class="maincategory  ">
      @foreach($categories as $category)
      <div class="maindog col-sm-6" style="background-image: url('/assets/images/{{$category->img}}');">
          <div >
            <a href="{{route('subcategories',$category->id)}}"> {{ $category->name }}</a>
          </div>
      </div>
      @endforeach
    </div>












    <!-- endddddd cateegorrrryyyyyyyyyyyyy -->

    <h2 class="main-title"><a href="{{route('service')}}">Services</a></h2>

    <!-- starrrt elserrrrrvicesssssssssssssssssssssssssssssssssssss -->

    <section class="services">
      <div class="dog">
        <div class="icondog"><i class="fa-solid fa-dog"></i></div>

        <p>
          Take care of the dog and provide the necessary care for him, and that
          is by playing with him and providing the appropriate healthy food for
          him.
        </p>

        <div class="iconforward"><i class="fa-solid fa-chevron-right"></i></div>
      </div>

      <div class="dog">
        <div class="icondog"><i class="fa-sharp fa-solid fa-cat"></i></div>

        <p>
          There are some factors and features that must be followed to take care
          of domestic cats. If you decide to own a cat, raise it 
          responsibility for it.
        </p>

        <div class="iconforward"><i class="fa-solid fa-chevron-right"></i></div>
      </div>

      <div class="dog">
        <div class="icondog"><i class="fa-solid fa-fish"></i></div>

        <p>
          One of the most common pastimes among teenagers is the breeding of
          ornamental fish. Because of the magnificent colors, wonderful shapes

        </p>

        <div class="iconforward"><i class="fa-solid fa-chevron-right"></i></div>
      </div>
    </section>

    <!-- end servicccccesssssssssssssssss -->
@endsection
