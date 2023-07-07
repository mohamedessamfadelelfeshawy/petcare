<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPet;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;




class UserPetController extends Controller
{
    public function index()
    {
        $pets=UserPet::all();

        return view('pets',compact('pets'));
    }

    public function create ()
    {
        return view('add-pet');
    }

    public function store (Request $request)
    {
        
        $file = $request->file('img');

        $filename = time().'_'.$file->getClientOriginalName();

        // File upload location
        $location = 'assets/images/uploads';

        // Upload file
        $file->move($location,$filename);
 

        UserPet::create([
            'user_id' => Auth::user()->id ,
            'name' => $request->name,
            'img'=>'/uploads/'.$filename,
            'vaccines' => $request->vaccines
        ]);

        
        return redirect()->route('home');
    }

    public function delete (Request $request, $id)
    {
        $pet = UserPet::findOrFail($id);
        $pet->delete();
        
        return redirect()->route('home');
    }
}
