<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;

class ContactFormController extends Controller
{
    //all message list

    public function AllMessage(){
        return view('admin.message.index');
    }

    public function AddMessage(Request $request){
        $validated = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'subject' => 'required',
        'message' => 'required',
    ]);


    contact_form::insert([
        'name' =>$request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
        'created_at' => Carbon::now()
    ]);

    return Redirect()->back()->with('success','Message Send successfully | ThankYou :)');

    }
    
}
