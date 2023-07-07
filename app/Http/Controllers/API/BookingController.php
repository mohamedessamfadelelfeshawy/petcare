<?php

namespace App\Http\Controllers\API;

use JWTAuth;
use Validator;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller as controller;


class BookingController extends Controller
{
    protected function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [ 
            'doctor_id' => 'required', 
            'pet_name' => 'required',
            'date' => 'required',
            'time' => 'required'
       ]); 

       if ($validator->fails()) {  
            return response()->json(['error'=>$validator->errors()], 401); 
        }   

        $user = JWTAuth::user();

        $booking=Booking::create([
            'user_id' => $user->id ,
            'doctor_id' => $request->doctor_id,
            'pet_name' => $request->pet_name,
            'date' => $request->date,
            'time' => $request->time,
        ]);
        return response()->json(['message' => 'success']);
    }

    public function approve(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [ 
            'id' => 'required', 
       ]); 

       if ($validator->fails()) {  
            return response()->json(['error'=>$validator->errors()], 401); 
        }   

        $booking = Booking::findOrFail($request->id);
        $booking->status = 'approved';
        $booking->update($request->all());
        
        return response()->json(['message' => 'success']);
    }

    public function myBooking(Request $request)
    {
        $user = JWTAuth::user();
        $booking=Booking::where('user_id',$user ->id)->get();
        return response()->json(['booking' => $booking]);
    }

    public function vetBooking(Request $request)
    {
        $user = JWTAuth::user();
        $booking=Booking::where('doctor_id',$user ->id)->get();
        return response()->json(['booking' => $booking]);
    }
}
