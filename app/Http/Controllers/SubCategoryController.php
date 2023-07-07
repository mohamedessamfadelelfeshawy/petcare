<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;


class SubCategoryController extends Controller
{
    public function index(Request $request)
    {
        $category=Category::where('id',$request->id)->first();
        $subCategories=SubCategory::where('category_id',$request->id)->get();
        return view('subcategories',compact('subCategories','category'));
    }
}
