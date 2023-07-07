<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\UserPet;
use App\Models\Notification;
use App\Models\Booking;

use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories=Category::orderby('id','asc')->take(2)->get();
        $products=Product::orderby('id','desc')->take(5)->get();

        return view('welcome',compact('categories','products'));
    }

    public function home()
    {
        $userPets=UserPet::where('user_id',Auth::user()->id)->get();

        //check user pets less than 10 days
        //delete all notifications
        Notification::where('user_id',Auth::user()->id)->delete();

        foreach($userPets as $pet){
            $now = time(); // or your date as well
            $your_date = strtotime($pet->vaccines);
            $datediff = ceil(($your_date - $now)/86400);
            if($datediff < 10){
                //add to notification
                Notification::create([
                    'user_id' => Auth::user()->id ,
                    'notification' => $pet->name.' vaccined in '.$datediff.' days',
                    'type' => 'home',
                ]);
            }
        }

        $booking=Booking::where(['user_id'=>Auth::user()->id,'status'=>'approved'])->get();
        foreach($booking as $book){
            if(!empty($book)){
                $now = time(); // or your date as well
                $your_date = strtotime($book->date);
                
                //add to notification
                if($your_date > $now){
                    Notification::create([
                        'user_id' => Auth::user()->id ,
                        'notification' => $book->pet_name.' booking is approved',
                        'type' => 'my-booking',
                    ]);
                }
              
            }
        }


        return view('home',compact('userPets'));
    }

}
