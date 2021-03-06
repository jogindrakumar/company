<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    //show home page services

    public function Service(){
        $services = DB::table('services')->where('service_name','Web Development')->first();
        $second_service = DB::table('services')->where('service_name','SEO Expert')->first();
        return view('pages.service',compact('services','second_service'));
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
$notification = array(
                        'message' => 'service inserted successfully',
                        'alert-type' => 'success'
                    );
    return Redirect()->back()->with($notification);

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
$notification = array(
                        'message' => 'service updated successfully',
                        'alert-type' => 'success'
                    );
    return Redirect()->route('all.service')->with($notification);
   
   

    }
    public function Delete($id){
        $notification = array(
                        'message' => 'service deleted successfully!',
                        'alert-type' => 'success'
                    );
         Service::find($id)->delete();
         return Redirect()->back()->with($notification);

    }
}
