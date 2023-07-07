<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;


class ServiceController extends Controller
{
    public function index()
    {
        $categories=Category::all();

        return view('service',compact('categories'));
    }

    public function check(Request $request)
    {

        $checkList=[];

        $checkList['category_id']=$category_id=$request->category_id;
        if(!empty($request->temprature)){
            $checkList['temperature']='1';
        }else{
            $checkList['temperature']='0';
        }

        if(!empty($request->voming)){
            $checkList['voming']='1';
        }else{
            $checkList['voming']='0';
        }

        if(!empty($request->lack_of_appetite)){
            $checkList['lack_of_appetite']='1';
        }else{
            $checkList['lack_of_appetite']='0';
        }

        if(!empty($request->urinating)){
            $checkList['urinating']='1';
        }else{
            $checkList['urinating']='0';
        }

        $service=Service::where($checkList)->first();


        if($service->is_normal == 0){
            $result='Abnormal';
        }else{
            $result='Normal';
        }
       
        $categories=Category::all();

        return view('service',compact('result','categories','category_id','checkList'));
    }
}
