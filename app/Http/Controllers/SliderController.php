<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use App\Models\Slider;
class SliderController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    // all slider function 

    public function AllSlider(){
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    // Add brand function 

    public function AddSlider(Request $request){
        $validated = $request->validate([
        'slider_name' => 'required|unique:sliders|min:4',
        'slider_text' => 'required|min:4',
        'slider_image' => 'required|mimes:png,jpg,jpeg',
    ]);

    $slider_image = $request->file('slider_image');
    $name_gen = hexdec(uniqid());
    $img_ext = strtolower($slider_image->getClientOriginalExtension());
    $upload_location = 'image/slider/';
    $image_name = $name_gen.'.'.$img_ext;
    $last_img = $upload_location.$image_name;
    $slider_image->move($upload_location,$image_name);

    Slider::insert([
        'slider_name' =>$request->slider_name,
        'slider_text' =>$request->slider_text,
        'slider_image' => $last_img,
        'created_at' => Carbon::now()
    ]);

    return Redirect()->back()->with('success','slider inserted successfully');

    }

    //edit brand 

    public function Edit($id){
        $sliders = Slider::find($id);
        return view('admin.slider.edit',compact('sliders'));
    }

    // update brand function

    public function Update(Request $request , $id){
        $validated = $request->validate([
        'slider_name' => 'required|min:4',
        'slider_text' => 'required|min:4',
        
    ]);
    $slider_image = $request->file('slider_image');
    $old_image = $request->old_image;
    if($slider_image){


        $name_gen = hexdec(uniqid());
    $img_ext = strtolower($slider_image->getClientOriginalExtension());
    $upload_location = 'image/slider/';
    $image_name = $name_gen.'.'.$img_ext;
    $last_img = $upload_location.$image_name;
    $slider_image->move($upload_location,$image_name);
    unlink($old_image);

    Slider::find($id)->update([
        'slider_image' => $last_img,
        'updated_at' => Carbon::now()
    ]);

    return Redirect()->route('all.slider')->with('success','slider image image updated  successfully');

    }else{
Slider::find($id)->update([
        'slider_name' =>$request->slider_name,
        'slider_text' =>$request->slider_text,
        
        'updated_at' => Carbon::now()
    ]);

    return Redirect()->route('all.slider')->with('success','slider name updated successfully');
    }

    }
}
