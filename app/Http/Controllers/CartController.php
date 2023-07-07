<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems=Cart::where('user_id',Auth::user()->id )->get();
        return view('cart',compact('cartItems'));
    }

    protected function create(Request $request)
    {
        $cartItems=Cart::where(['user_id'=>Auth::user()->id,'product_id'=> $request->product_id])->get();

        if($cartItems->count() == 0){
            Cart::create([
                'user_id' => Auth::user()->id ,
                'product_id' => $request->product_id
            ]);
        }       

        return redirect()->route('cart');

    }

    public function increaseItems (Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $product = Product::findOrFail($cart->product_id);
        $error='';
        if($request->quantity > $product->stock){
            $error='No enough stock';
        }else{
            $cart->update($request->all());
        }

        return redirect()->route('cart');

    }

    public function decreaseItems (Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        if($request->quantity == 0){
            $cart->delete();
        }else{
            $cart->update($request->all());
        }
        return redirect()->route('cart');
    }

    public function confirm(Request $request){
        $cart = Cart::where( 'user_id' , Auth::user()->id )->get();
        foreach($cart as $item){
            $product = Product::findOrFail($item->product_id);
            $newStock=$product->stock-$item->quantity;
            if($newStock <=0){
                $product->delete();
            }else{
                $product->stock=$newStock;
                $product->update();
            }
           
            $item->delete();
        }
        return redirect()->route('cart');

    }
}
