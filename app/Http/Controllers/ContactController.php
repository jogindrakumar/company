<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    //
    public function Contact(){
        $contacts = Contact::first();
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
    $notification = array(
                        'message' => 'contact inserted successfully',
                        'alert-type' => 'success'
                    );

    return Redirect()->back()->with($notification);

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
    $notification = array(
                        'message' => 'contact updated successfully',
                        'alert-type' => 'warning'
                    );

    return Redirect()->route('all.contact')->with($notification);
   
   

    }
    public function Delete($id){
        $notification = array(
                        'message' => 'contact deleted successfully!',
                        'alert-type' => 'error'
                    );
         Contact::find($id)->delete();
         return Redirect()->back()->with($notification);

    }


    //all message list

    public function AllMessage(){
        $messages = ContactForm::all();
        return view('admin.message.index',compact('messages'));
    }

    public function AddMessage(Request $request){
        $validated = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'subject' => 'required',
        'message' => 'required',
    ]);


    ContactForm::insert([
        'name' =>$request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
        'created_at' => Carbon::now()
    ]);
    $notification = array(
                        'message' => 'Message Send successfully | ThankYou :)',
                        'alert-type' => 'success'
                    );

    return Redirect()->route('contact')->with($notification);

    }

    // delete message
    public function DeleteMessage($id){
        ContactForm::find($id)->delete();
        $notification = array(
                        'message' => 'Message delete successfully',
                        'alert-type' => 'error'
                    );
        return Redirect()->back()->with($notification);

    }
}
