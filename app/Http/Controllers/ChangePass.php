<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangePass extends Controller
{
    //change password

    public function CPass(){
        return view('admin.body.change_password');
    }

    public function UpdatePassword(){
        
    }
}
