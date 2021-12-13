<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    //
    public function Contact(){
        return view('pages.contact');
    }

      // all contact function 

    public function AllContact(){
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }

    // Add contact function 

    public function AddContact(Request $request){
        $validated = $request->validate([
        'contact_name' => 'required|unique:contacts|min:4',
        'contact_text' => 'required',
    ]);


    Contact::insert([
        'contact_name' =>$request->contact_name,
        'contact_text' => $request->contact_text,
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
        'contact_name' => 'required|min:4',
        'contact_text' => 'required',
        
    ]);
    Contact::find($id)->update([
        'contact_name' =>$request->contact_name,
        'contact_text' => $request->contact_text,
        'created_at' => Carbon::now()
    ]);

    return Redirect()->route('all.contact')->with('success','contact updated successfully');
   
   

    }
    public function Delete($id){
         Contact::find($id)->delete();
         return Redirect()->back()->with('success','contact deleted successfully!');

    }
}
