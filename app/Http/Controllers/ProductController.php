<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use  Illuminate\Database\Eloquent\Collection;


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
       

        return view('products',compact('products','recommendation'));

    }

    public function create ()
    {
        $categories=Category::all();
        return view('add-product',compact('categories'));
    }

    public function store (Request $request)
    {
        
        $file = $request->file('img');

        $filename = time().'_'.$file->getClientOriginalName();

        // File upload location
        $location = 'assets/images/uploads';

        // Upload file
        $file->move($location,$filename);

        Product::create([
            'user_id' => Auth::user()->id ,
            'category_id' => $request->category_id,
            'type' => $request->type,
            'title' => $request->title,
            'price' => $request->price,
            'img'=>'/uploads/'.$filename,
            'stock' => $request->stock
        ]);

        
        return redirect()->route('products');
    }

    public function myProducts(Request $request)
    {
        $products=Product::where(['user_id'=>Auth::user()->id])->orderby('id','desc')->get(); 

        return view('my-products',compact('products'));

    }

    public function delete (Request $request, $id)
    {
        $pet = Product::findOrFail($id);
        $pet->delete();

        Cart::where('product_id',$request->id)->delete();

        return redirect()->route('product.myProducts');
    }


}
