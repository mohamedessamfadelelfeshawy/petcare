<?php

namespace App\Http\Controllers\API;
use Validator;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;
use App\Http\Controllers\Controller as controller;



class ServiceController extends Controller
{

    public function check(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [ 
          'category_id' => 'required',  
        ]); 

       if ($validator->fails()) {  
            return response()->json(['error'=>$validator->errors()], 401); 
        } 

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

        return response()->json(['result' => $result]);
    }
}
