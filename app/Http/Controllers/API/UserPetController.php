<?php

namespace App\Http\Controllers\API;
use Validator;
use JWTAuth;

use Illuminate\Http\Request;
use App\Models\UserPet;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller as controller;



class UserPetController extends Controller
{
    public function index()
    {
        $user = JWTAuth::user();
        $pets=UserPet::where('user_id',$user->id )->get();
        return response()->json(['pets' => $pets]);
    }

    public function store (Request $request)
    {
        $validator = Validator::make($request->all(), 
        [ 
          'name' => 'required',  
          'vaccines' => 'required',  
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
        $user = JWTAuth::user();

        UserPet::create([
            'user_id' => $user->id ,
            'name' => $request->name,
            'img'=>'/uploads/'.$filename,
            'vaccines' => $request->vaccines
        ]);

        
        return response()->json(['message' => 'success']);
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

        $pet = UserPet::findOrFail($request->id);
        $pet->delete();
        
        return response()->json(['message' => 'success']);
    }
}
