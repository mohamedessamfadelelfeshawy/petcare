<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        return view('booking');
    }

    public function create(Request $request)
    {
        $doctor_id=$request->doctor_id;
        return view('booking',compact('doctor_id'));
    }

    protected function store(Request $request)
    {
        $booking=Booking::create([
            'user_id' => Auth::user()->id ,
            'doctor_id' => $request->doctor_id,
            'pet_name' => $request->pet_name,
            'date' => $request->date,
            'time' => $request->time,

        ]);
        return redirect()->route('booking.myBooking');    
    }

    public function approve(Request $request,$id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'approved';
        $booking->update($request->all());
        
        return redirect()->route('booking.vetBooking');
    }

    public function myBooking(Request $request)
    {
        $booking=Booking::where('user_id',Auth::user()->id)->get();
        return view('my-booking',compact('booking'));
    }

    public function vetBooking(Request $request)
    {
        $booking=Booking::where('doctor_id',Auth::user()->id)->get();
        return view('vet-booking',compact('booking'));
    }
}
