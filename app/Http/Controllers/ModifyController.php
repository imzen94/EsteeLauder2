<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Social;

class ModifyController extends Controller
{

     /**
     * Update the avatar for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function show(){

        $banner = Banner::all();
        $category = Category::all();
        $product = Product::all();
        $social = Social::all();
        return view('esteelauder.modify',['banners'=>$banner, 'categories'=>$category, 'products'=>$product, 'socials'=>$social, 'update'=>null, 'select'=>null, 'table'=>null]);
    }

    public function select(Request $request){

        $banner = Banner::all();
        $category = Category::all();
        $product = Product::all();
        $social = Social::all();

        $update = null;
        $selected = null;
        $table = null;

        if(!empty($request->id)){
            $update = $request->update;
            $table = $request->table;

            $selected = DB::table($table)
            ->where('id', $request->id)
            ->first();
        }

        return view('esteelauder.modify',['banners'=>$banner, 'categories'=>$category, 'products'=>$product, 'socials'=>$social, 'update'=>$update, 'select'=>$selected, 'table'=>$table]);
    }

    private function requestImg(Request $request){
        if(empty($request->file('new_img'))){
            $fileName = $request->old_img;
        }else {
            $file = $request->file('new_img');
            $file = $request->new_img;
            $fileName = $file->getClientOriginalName();

            Storage::putFileAs('public/img/', $file, $fileName);
        }

        return $fileName;
    }

       
    public function modify_banner(Request $request){
        // validation
        $validated = $request->validate([
            'name' => 'required|string',
            'new_img' => 'nullable|image',
        ]);


        // upload and insert
        $fileName = self::requestImg($request);

        Banner::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'img' => $fileName
        ]);
        
        return redirect()->route('modify');
       
    }

    public function modify_category(Request $request){
        // validation
        $validated = $request->validate([
            'name_en' => 'required|string',
            'name_cn' => 'required|string',
            'new_img' => 'nullable|image',
        ]);


        // upload and insert
        $fileName = self::requestImg($request);

        Category::where('id', $request->id)
        ->update([
            'name_en' => $request->name_en,
            'name_cn' => $request->name_cn,
            'img' => $fileName
        ]);
        
        return redirect()->route('modify');
    }

    public function modify_product(Request $request){
        // validation
        $validated = $request->validate([
            'category_id' => 'required|numeric',
            'name_en' => 'required|string',
            'name_cn' => 'required|string',
            'new_img' => 'nullable|image',
            'description' => 'required|string',
            'star' => 'required|boolean',
        ]);


        // upload and insert
        $fileName = self::requestImg($request);

        Product::where('id', $request->id)
        ->update([
            'category_id' => $request->category_id,
            'name_en' => $request->name_en,
            'name_cn' => $request->name_cn,
            'img' => $fileName,
            'description' => $request->description,
            'star' => $request->star
        ]);
        
        return redirect()->route('modify');
    }

    public function modify_social(Request $request){
        // validation
        $validated = $request->validate([
            'name' => 'required|string',
            'new_img' => 'nullable|image',
            'link' => 'required|url',
        ]);


        // upload and insert
        $fileName = self::requestImg($request);

        Social::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'img' => $fileName,
            'link' => $request->link,
        ]);
        
        return redirect()->route('modify');
    }

    public function delete_banner(Request $request){
        Banner::where('id', '=', $request->id)->delete();
        return redirect('modify');
    }

    public function delete_category(Request $request){
        Category::where('id', '=', $request->id)->delete();
        return redirect('modify');
    }

    public function delete_product(Request $request){
        Product::where('id', '=', $request->id)->delete();
        return redirect('modify');
    }

    public function delete_social(Request $request){
        Social::where('id', '=', $request->id)->delete();
        return redirect('modify');
    }

}
