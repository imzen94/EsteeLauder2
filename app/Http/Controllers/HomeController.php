<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Banner;
use App\Models\Category;

class HomeController extends Controller
{
    public function show(){

        $banner = Banner::all();
        $category = Category::all();
        return view('esteelauder.index',['banners'=>$banner, 'categories'=>$category]);
    }

}
