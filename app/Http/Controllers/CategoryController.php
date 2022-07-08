<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Social;


class CategoryController extends Controller
{
    
    public function show($id=null){

        $social = Social::all();
        $category = Category::findOrFail($id);

        return view('esteelauder.detail' , ['category' => $category , 'social' => $social]);

    }

}
