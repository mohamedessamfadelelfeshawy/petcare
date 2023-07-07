<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Http\Controllers\Controller as controller;


class SubCategoryController extends Controller
{
    public function index(Request $request)
    {
        $subCategories=SubCategory::where('category_id',$request->id)->get();
        return response()->json(['subCategories' => $subCategories]);
    }
}
