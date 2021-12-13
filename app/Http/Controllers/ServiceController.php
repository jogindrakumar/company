<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Carbon;

class ServiceController extends Controller
{
    //show home page services

    public function Service(){
        return view('pages.service');
    }

      // all service function 

    public function AllService(){
        $services = Service::all();
        return view('admin.service.index',compact('services'));
    }

    // Add service function 

    public function Addservice(Request $request){
        $validated = $request->validate([
        'service_name' => 'required|unique:services|min:4',
        'service_text' => 'required',
    ]);


    Service::insert([
        'service_name' =>$request->service_name,
        'service_text' => $request->service_text,
        'created_at' => Carbon::now()
    ]);

    return Redirect()->back()->with('success','service inserted successfully');

    }

    //edit service 

    public function Edit($id){
        $services = Service::find($id);
        return view('admin.service.edit',compact('services'));
    }

    // update service function

    public function Update(Request $request , $id){
        $validated = $request->validate([
        'service_name' => 'required|min:4',
        'service_text' => 'required',
        
    ]);
    Service::find($id)->update([
        'service_name' =>$request->service_name,
        'service_text' => $request->service_text,
        'created_at' => Carbon::now()
    ]);

    return Redirect()->route('all.service')->with('success','service updated successfully');
   
   

    }
    public function Delete($id){
         Service::find($id)->delete();
         return Redirect()->back()->with('success','service deleted successfully!');

    }
}
