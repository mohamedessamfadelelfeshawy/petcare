@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="/assets/css/shopHome.css" />
     <link rel="stylesheet" href="/assets/css/app.css" />
@endpush

@section('content')
<div class="my-2" id="mainapp">
    <!--   image cener home-->
    <div class="maincart">
      <div class="textphoto">
        <p>Your Cart is ready Now!</p>
      </div>
    </div>

    <div  style="margin-top:100px;margin-bottom:100px">
        @if(count($cartItems) == 0)
        <h3 class="text-danger text-center my-2"> Sorry Your Cart Is Empty Please Add Proudct</h3>
        @else


        <h1 class=" text-center my-2 detalis" > Cart Details</h1>

        <table class="table table-striped table-bordered " id="tadle2" v-else>
            <thead>
                <tr>
                    <th> ID</th>
                    <th> Name</th>
                    <th> Price</th>
                    <th> Quantity</th>
                    <th> Add</th>
                    <th> Remove</th>
                    <th> Total Price</th>
                </tr>
            </thead>
            <tbody>
            @php
                $i = 0;
                $total=0;
                $tax=0;
                $totalfinal=0;
            @endphp
            @foreach($cartItems as $item)
                @php
                $i ++;
                $itemPrice=($item->product->price)*$item->quantity;
                $total+=($item->product->price)*$item->quantity;
                $tax+=($item->product->price * 14 /100 * $item->quantity);
                $totalfinal+=($total+$tax);
                $increaseQuantity=$item->quantity+1;
                $decreaseQuantity=$item->quantity-1;
            @endphp
                <tr v-for="item in cart.items">
                    <td> {{$i}} </td>
                    <td> {{$item->product->title}}</td>
                    <td> {{$item->product->price}} LE</td>
                    <td> {{$item->quantity}}</td>
                    <td>
                        <form action="{{ route('cart.increaseItems',$item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="quantity" value="{{$increaseQuantity}}">
                            <input class="btn btn-success" value="+" type="submit">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('cart.decreaseItems',$item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="quantity" value="{{$decreaseQuantity}}">
                            <input class="btn btn-danger" value="-" type="submit">
                        </form>
                    </td>
                    <td> {{$itemPrice}} LE </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td>Total price</td>
                    <td>Taxes</td>
                    <td colspan="4">Final Price With Taxes</td>
                </tr>
                <tr>
                    <td>{{$total}}</td>
                    <td>{{$tax}}</td>
                    <td colspan="4">
                    {{$totalfinal}}</td>
                </tr>
            </tfoot>

        </table>
        @endif

        <form action="{{ route('cart.confirm') }}" method="POST" class="newbtn">
            @csrf
            @method('POST')

            <!-- payment -->
                <div  class="payment">
                <input type="text" placeholder="Card Number" name="card number">
                <input type="text" placeholder="CVV"  name="CVV">
                <input type="text" placeholder="Address"  name="Address">

                </div>
                <input class="btn btn-lg btn-success  " id="btnconfirm" value="Confirm" type="submit">
        </form>
    </div>

</div><!-- end of container-->


@endsection

@push('scripts')

<script src="/assets/js/vueversion3.js"></script>

@endpush
