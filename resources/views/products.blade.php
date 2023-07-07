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

                    <p class="instock">Instock:<span> {{$product->stock}}</span></p>

                    <form method="POST" action="{{ route('cart.create') }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">

                        <button class="btn btn-primary " type="submit"> Add To Cart</button>
                    </form>
                </div>
                <p class="text-center instock"> {{$product->price}} LE</p>

            </div><!--end card-->
        @endforeach
        </div><!-- end proudct-->

    </div>
</div><!-- end of container-->






<!-- recommmmendion -->
@if(!empty($recommendation))
<section class="rela" id="recomend2" style="display: none;">
    <section class="recomend" id="geryy">
        <span><i class="fa-sharp fa-solid fa-circle-xmark" id="recomendation"></i></span>
        <div><img src="/assets/images/{{$recommendation->img}}" alt="not found"></div>
        <div>
            <h2 class="instock2">{{$recommendation->title}}</h2>
        </div>
        <div>
            <p class=>{{$recommendation->price}} </p>
        </div>
        <div>
        <form method="POST" action="{{ route('cart.create') }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$recommendation->id}}">

                        <button class="btn btn-primary btn2" type="submit"> Add To Cart</button>
                    </form>
        </div>
    </section>
</section>
@endif



@endsection

@push('scripts')

<script src="/assets/js/vueversion3.js"></script>

<script>
    /*
    //vue intance
    const app = Vue.createApp({
        data: () => ({
            products: products,
            iscartvisible: false,
            cart: {
                items: []
            }

        }),
        methods: {
            addtoCart(proudct) {
                this.cart.items.push({
                    proudct: proudct,
                    quantity: 1
                });
                proudct.instock--;
            },
            gettotalprice() {
                let result = 0;
                for (let i = 0; i < this.cart.items.length; i++) {
                    result += this.cart.items[i].proudct.price * this.cart.items[i].quantity;
                }
                return result;
            },

        }

    });*/
    // monut
    window.onload = function() {
        setTimeout(function() {
            document.getElementById("recomend2").style.display = "block";
        }, 5000);
    }

    let recomendation = document.getElementById("recomendation");
    let dav = document.getElementById("geryy");

    recomendation.addEventListener("click", () => {
        dav.style.display = "none";
    })
</script>

@endpush