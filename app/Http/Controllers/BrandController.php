<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Auth;
use Illuminate\Support\Carbon;

class BrandController extends Controller
{
    //logout route

    public function Logout(){
        Auth::logout();
        return Redirect()->route('login');
    }


    // all brand function 

    public function AllBrand(){
        $brands = Brand::all();
        return view('admin.brand.index',compact('brands'));
    }

    // Add brand function 

    public function AddBrand(Request $request){
        $validated = $request->validate([
        'brand_name' => 'required|unique:brands|min:4',
        'brand_image' => 'required|mimes:png,jpg,jpeg',
    ]);

    $brand_image = $request->file('brand_image');
    $name_gen = hexdec(uniqid());
    $img_ext = strtolower($brand_image->getClientOriginalExtension());
    $upload_location = 'image/brand/';
    $image_name = $name_gen.'.'.$img_ext;
    $last_img = $upload_location.$image_name;
    $brand_image->move($upload_location,$image_name);

    Brand::insert([
        'brand_name' =>$request->brand_name,
        'brand_image' => $last_img,
        'created_at' => Carbon::now()
    ]);

    return Redirect()->back()->with('success','brand inserted successfully');

    }

    //edit brand 

    public function Edit($id){
        $brands = Brand::find($id);
        return view('admin.brand.edit',compact('brands'));
    }

    // update brand function

    public function Update(Request $request , $id){
        $validated = $request->validate([
        'brand_name' => 'required|min:4',
        
    ]);
    $brand_image = $request->file('brand_image');
    $old_image = $request->old_image;
    if($brand_image){


        $name_gen = hexdec(uniqid());
    $img_ext = strtolower($brand_image->getClientOriginalExtension());
    $upload_location = 'image/brand/';
    $image_name = $name_gen.'.'.$img_ext;
    $last_img = $upload_location.$image_name;
    $brand_image->move($upload_location,$image_name);
    unlink($old_image);

    Brand::find($id)->update([
        'brand_image' => $last_img,
        'updated_at' => Carbon::now()
    ]);

    return Redirect()->route('all.brand')->with('success','brand image updated  successfully');

    }else{
Brand::find($id)->update([
        'brand_name' =>$request->brand_name,
        
        'updated_at' => Carbon::now()
    ]);

    return Redirect()->route('all.brand')->with('success','brand name updated successfully');
    }

    }


}
