<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 
use App\Http\Requests\Posts\CreateRequest;
use App\Models\Post;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Social;

class InsertController extends Controller
{

     /**
     * Update the avatar for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function show(){

        return view('esteelauder.insert', ['status'=>'none']);
    }

    private function uploadImg(Request $request){
        $file = $request->file('img');
        $file = $request->img;
        $fileName = $file->getClientOriginalName();

        Storage::putFileAs('public/img/', $file, $fileName);

        return $fileName;
    }

    public function action_banner(Request $request){
        // validation
        $validated = $request->validate([
            'name' => 'required|string',
            'img' => 'required|image',
        ]);


        // upload and insert
        $fileName = self::uploadImg($request);

        Banner::insert([
            'name' => $request->name,
            'img' => $fileName
        ]);
        return view('esteelauder.insert', ['status'=>'inserted successfully.']);
    }

    public function action_category(Request $request){
        // validation
        $validated = $request->validate([
            'name_en' => 'required|string',
            'name_cn' => 'required|string',
            'img' => 'required|image',
        ]);


        // upload and insert
        $fileName = self::uploadImg($request);

        Category::insert([
            'name_en' => $request->name_en,
            'name_cn' => $request->name_cn,
            'img' => $fileName
        ]);
        return view('esteelauder.insert', ['status'=>'inserted successfully.']);
    }

    public function action_product(Request $request){
        // validation
        $validated = $request->validate([
            'category_id' => 'required|numeric',
            'name_en' => 'required|string',
            'name_cn' => 'required|string',
            'img' => 'required|image',
            'description' => 'required|string',
            'star' => 'required|boolean',
        ]);


        // upload and insert
        $fileName = self::uploadImg($request);

        Product::insert([
            'category_id' => $request->category_id,
            'name_en' => $request->name_en,
            'name_cn' => $request->name_cn,
            'img' => $fileName,
            'description' => $request->description,
            'star' => $request->star
        ]);
        return view('esteelauder.insert', ['status'=>'inserted successfully.']);
    }

    public function action_social(Request $request){
        // validation
        $validated = $request->validate([
            'name' => 'required|string',
            'img' => 'required|image',
            'link' => 'required|url',
        ]);


        // upload and insert
        $fileName = self::uploadImg($request);

        Social::insert([
            'name' => $request->name,
            'img' => $fileName,
            'link' => $request->link
        ]);
        return view('esteelauder.insert', ['status'=>'inserted successfully.']);
    }

}
