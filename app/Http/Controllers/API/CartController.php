<?php

namespace App\Http\Controllers\API;
 
use JWTAuth;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller as controller;
use App\Models\Cart;
use App\Models\Product;


class CartController extends Controller
{
    public $token = true;

    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [ 
       ]);  

        if ($validator->fails()) {  

        return response()->json(['error'=>$validator->errors()], 401); 

        }   


        $user = JWTAuth::user();
        
        $cartItems=Cart::where('user_id',$user->id )->get();
        return response()->json(['cartItems' => $cartItems]);
    }

    protected function create(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [ 
          'product_id' => 'required',  
        ]); 

       if ($validator->fails()) {  
 
            return response()->json(['error'=>$validator->errors()], 401); 

        }   

       $user = JWTAuth::authenticate($request->token);

        $cartItems=Cart::where(['user_id'=>$user->id,'product_id'=> $request->product_id])->get();

        if($cartItems->count() == 0){
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $request->product_id
            ]);
        }       

        return response()->json(['message' => 'success']);

    }

    public function increaseItems (Request $request)
    {
        $validator = Validator::make($request->all(), 
        [ 
            'cart_id' => 'required',  
            'quantity' => 'required',  
       ]); 

       if ($validator->fails()) {  
 
        return response()->json(['error'=>$validator->errors()], 401); 

     }   
        $cart = Cart::findOrFail($request->cart_id);
        $cart->quantity=$request->quantity;
        $cart->update($request->all());

        return response()->json(['message' => 'success']);

    }

    public function decreaseItems (Request $request)
    {
        $validator = Validator::make($request->all(), 
        [ 
            'cart_id' => 'required',  
            'quantity' => 'required',  
       ]); 

       if ($validator->fails()) {  
            return response()->json(['error'=>$validator->errors()], 401); 
        }   

        $cart = Cart::findOrFail($request->cart_id);
        if($request->quantity == 0){
            $cart->delete();
        }else{
            $cart->quantity=$request->quantity;
            $cart->update($request->all());
        }
        return response()->json(['message' => 'success']);
    }

    public function confirm(Request $request){
        $user = JWTAuth::user();

        $cart = Cart::where( 'user_id' , $user->id)->get();

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
        return response()->json(['message' => 'success']);

    }
}
