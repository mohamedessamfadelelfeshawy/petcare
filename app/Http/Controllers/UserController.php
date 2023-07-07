<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function vets(Request $request)
    {
        $vets=User::where('type','Vet')->get();

        return view('vets',compact('vets'));
    }

    public function edit()
    {
        return view('edit-profile');
    }

    public function update(Request $request, $id){
        $user = User::findOrFail(Auth::user()->id );
        $user->update($request->all());
        return redirect()->route('home');

    }

    public function changeImage (Request $request, $id)
    {
        $file = $request->file('img');

        $filename = time().'_'.$file->getClientOriginalName();

        // File upload location
        $location = 'assets/images/uploads';

        // Upload file
        $file->move($location,$filename);
        $user = User::findOrFail(Auth::user()->id );
        $user->img='/uploads/'.$filename;
        $user->save();

        return redirect()->route('home');

    }
}
