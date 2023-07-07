<?php

namespace App\Http\Controllers\API;
use JWTAuth;
use Validator;

use Illuminate\Http\Request;
use App\Models\Product;

use App\Http\Controllers\Controller as controller;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if(!empty($request->category) && !empty($request->type)){
            $products=Product::where(['category_id'=>$request->category,'type'=>$request->type])->orderby('id','desc')->get(); 
        }elseif(!empty($request->search)){
            $products=Product::where('title','LIKE','%'.$request->search.'%')->orderby('id','desc')->get(); 
        }else{
            $products=Product::orderby('id','desc')->get(); 
        }

        if(!empty(count($products))){
            $recommendation = $products->random(1)->first();
        }else{
            $recommendation=[];
        }
        return response()->json(['products' => $products,'recommendation'=>$recommendation]);
    }

    public function store (Request $request)
    {

        $validator = Validator::make($request->all(), 
        [ 
          'category_id' => 'required',  
          'type' => 'required',  
          'title' => 'required',  
          'price' => 'required',  
          'stock' => 'required',  
        ]); 

       if ($validator->fails()) {  
            return response()->json(['error'=>$validator->errors()], 401); 
        } 

        
        $file = $request->file('img');

        $filename = time().'_'.$file->getClientOriginalName();

        // File upload location
        $location = 'assets/images/uploads';

        // Upload file
        $file->move($location,$filename);

        Product::create([
            'user_id' => JWTAuth::user()->id ,
            'category_id' => $request->category_id,
            'type' => $request->type,
            'title' => $request->title,
            'price' => $request->price,
            'img'=>'/uploads/'.$filename,
            'stock' => $request->stock
        ]);

        
        return response()->json(['message' => 'success']);
    }

    public function myProducts(Request $request)
    {
        $user = JWTAuth::user();

        $products=Product::where(['user_id'=>$user->id])->orderby('id','desc')->get(); 

        return response()->json(['products' => $products]);

    }

    public function delete (Request $request)
    {
        $validator = Validator::make($request->all(), 
        [ 
          'id' => 'required',  
        ]); 

       if ($validator->fails()) {  
            return response()->json(['error'=>$validator->errors()], 401); 
        } 

        $pet = Product::findOrFail($request->id);
        $pet->delete();
        
        return response()->json(['message' => 'success']);
    }

}
