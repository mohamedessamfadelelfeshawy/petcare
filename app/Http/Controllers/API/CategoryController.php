<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller as controller;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return response()->json(['categories' => $categories]);
    }
}
