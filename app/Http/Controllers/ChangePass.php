<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class ChangePass extends Controller
{
    //change password

    public function CPass(){
        return view('admin.body.change_password');
    }

    public function UpdatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',

        ]);
        $Hashpassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $Hashpassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
             $notification = array(
                        'message' => 'password change successfully',
                        'alert-type' => 'success'
                    );
            return Redirect()->route('login')->with($notification);
        }else{
             $notification = array(
                        'message' => 'current password is Invalid',
                        'alert-type' => 'error'
                    );
            return Redirect()->back()->with($notification);
        }

    }

    public function ProfileUpdate(){
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('admin.body.change_profile',compact('user'));
            }
        }
    }

    public function UserProfileUpdate(Request $request){

            $user = User::find(Auth::user()->id);
            if($user){
                $user->name = $request['name'];
                $user->email = $request['email'];
                $user->save();
                $notification = array(
                        'message' => 'user profile successfully',
                        'alert-type' => 'warning'
                    );
                return Redirect()->back()->with($notification);
            }else{
                return Redirect()->back();
            }
       
    }
}
