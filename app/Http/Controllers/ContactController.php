<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    //
    public function Contact(){
        $contacts = Contact::all();
        return view('pages.contact',compact('contacts'));
    }

      // all contact function 

    public function AllContact(){
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }

    // Add contact function 

    public function AddContact(Request $request){
        $validated = $request->validate([
        'location' => 'required|unique:contacts',
        'email' => 'required',
        'call' => 'required',
    ]);


    Contact::insert([
        'location' =>$request->location,
        'email' => $request->email,
        'call' => $request->call,
        'created_at' => Carbon::now()
    ]);

    return Redirect()->back()->with('success','contact inserted successfully');

    }

    //edit contact 

    public function Edit($id){
        $contacts = Contact::find($id);
        return view('admin.contact.edit',compact('contacts'));
    }

    // update contact function

    public function Update(Request $request , $id){
     $validated = $request->validate([
        'location' => 'required',
        'email' => 'required',
        'call' => 'required',
    ]);
    Contact::find($id)->update([
            'location' =>$request->location,
            'email' => $request->email,
            'call' => $request->call,
            'updated_at' => Carbon::now()
    ]);

    return Redirect()->route('all.contact')->with('success','contact updated successfully');
   
   

    }
    public function Delete($id){
         Contact::find($id)->delete();
         return Redirect()->back()->with('success','contact deleted successfully!');

    }
}
