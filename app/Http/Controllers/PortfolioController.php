<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Carbon;

class PortfolioController extends Controller
{
    //show portfolio
    public function Portfolio(){
        return view('pages.portfolio');
    }

     public function AllPortfolio(){
        $portfolios = Portfolio::all();
        return view('admin.portfolio.index',compact('portfolios'));
    }

    // Add portfolio function 

    public function AddPortfolio(Request $request){
        $validated = $request->validate([
        'portfolio_name' => 'required|unique:portfolios|min:4',
        'portfolio_image' => 'required|mimes:png,jpg,jpeg',
    ]);

    $portfolio_image = $request->file('portfolio_image');
    $name_gen = hexdec(uniqid());
    $img_ext = strtolower($portfolio_image->getClientOriginalExtension());
    $upload_location = 'image/portfolio/';
    $image_name = $name_gen.'.'.$img_ext;
    $last_img = $upload_location.$image_name;
    $portfolio_image->move($upload_location,$image_name);

    Portfolio::insert([
        'portfolio_name' =>$request->portfolio_name,
        'portfolio_image' => $last_img,
        'created_at' => Carbon::now()
    ]);

    return Redirect()->back()->with('success','portfolio inserted successfully');

    }

    //edit portfolio 

    public function Edit($id){
        $portfolios = Portfolio::find($id);
        return view('admin.portfolio.edit',compact('portfolios'));
    }

    // update portfolio function

    public function Update(Request $request , $id){
        $validated = $request->validate([
        'portfolio_name' => 'required|min:4',
        
    ]);
    $portfolio_image = $request->file('portfolio_image');
    $old_image = $request->old_image;
    if($portfolio_image){


        $name_gen = hexdec(uniqid());
    $img_ext = strtolower($portfolio_image->getClientOriginalExtension());
    $upload_location = 'image/portfolio/';
    $image_name = $name_gen.'.'.$img_ext;
    $last_img = $upload_location.$image_name;
    $portfolio_image->move($upload_location,$image_name);
    unlink($old_image);

    Portfolio::find($id)->update([
        'portfolio_image' => $last_img,
        'updated_at' => Carbon::now()
    ]);

    return Redirect()->route('all.portfolio')->with('success','portfolio image updated  successfully');

    }else{
Portfolio::find($id)->update([
        'portfolio_name' =>$request->portfolio_name,
        
        'updated_at' => Carbon::now()
    ]);

    return Redirect()->route('all.portfolio')->with('success','portfolio name updated successfully');
    }

    }

}
