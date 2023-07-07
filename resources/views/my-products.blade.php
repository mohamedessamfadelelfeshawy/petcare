@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/assets/css/shopHome.css" />
    <link rel="stylesheet" href="/assets/css/app.css" />
@endpush

@section('content')
<div class="my-2" id="mainapp">
    <!--   image cener home-->

    <div class="main3" v-if="iscartvisible==false">
        <div class="textphoto">
            <p>Take care of what you feed your pet</p>
        </div>
    </div>

    <div class="arc">

        <p class="arc1 " v-if="iscartvisible==false"> Best products you can find</p>
        <div class=" row justify-content-center" >

        @foreach($products as $product)
            <div class=" card  col-sm-3"  v-for="proudct in products" id="carrd" style="margin:25px">
                <img src="/assets/images/{{$product->img}}"  class="imgdiv">
                <h5 class="text-center my-1 instock">{{$product->title}}</h5>

                <div class=" card-footer d-flex justify-content-between ">

                    <p  class="instock">Instock:<span> {{$product->stock}}</span></p>

                    <form method="POST" action="{{ route('product.delete',$product->id) }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="product_id" value="{{$product->id}}">

                        <button class="btn btn-danger" type="submit"> Delete</button>
                    </form>
                </div>
                <p class="text-center instock"> {{$product->price}} LE</p>

            </div><!--end card-->
        @endforeach
        </div><!-- end proudct-->

    </div>
</div><!-- end of container-->






@endsection

@push('scripts')

<script src="/assets/js/vueversion3.js"></script>

@endpush
