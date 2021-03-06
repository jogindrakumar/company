<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use App\Models\About;

class AboutController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }
     // all slider function 

     public function About(){
        $abouts = About::all();
        return view('pages.about',compact('abouts')); 
     }

    public function AllAbout(){
        $abouts = About::all();
        return view('admin.about.index',compact('abouts'));
    }

    // Add brand function 

    public function AddAbout(Request $request){
        $validated = $request->validate([
        'heading_one' => 'required|unique:abouts|min:4',
        'heading_two' => 'required|unique:abouts|min:4',
        'text_one' => 'required|unique:abouts|min:4',
        'list_one' => 'required|unique:abouts|min:4',
        'list_two' => 'required|unique:abouts|min:4',
        'list_three' => 'required|unique:abouts|min:4',
        'text_two' => 'required|unique:abouts|min:4',
        
    ]);

   

    About::insert([
        'heading_one' =>$request->heading_one,
        'heading_two' =>$request->heading_two,
        'text_one' => $request->text_one,
        'list_one' =>$request->list_one,
        'list_two' =>$request->list_two,
        'list_three' =>$request->list_three,
        'text_two' =>$request->text_two,
        'created_at' => Carbon::now()
    ]);
    $notification = array(
        'message' => 'about inserted successfully',
        'alert-type' => 'success'
    );

    return Redirect()->back()->with($notification);

    }

    //edit brand 

    public function Edit($id){
        $abouts = About::find($id);
        return view('admin.about.edit',compact('abouts'));
    }

    // update brand function

    public function Update(Request $request , $id){
      
    About::find($id)->update([
        'heading_one' =>$request->heading_one,
        'heading_two' =>$request->heading_two,
        'text_one' => $request->text_one,
        'list_one' =>$request->list_one,
        'list_two' =>$request->list_two,
        'list_three' =>$request->list_three,
        'text_two' =>$request->text_two,
        'updated_at' => Carbon::now()
    ]);
    $notification = array(
        'message' => 'about updated successfully',
        'alert-type' => 'warning'
    );

    return Redirect()->route('all.about')->with($notification);
    



    }
}
