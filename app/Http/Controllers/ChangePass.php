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
            return Redirect()->route('login')->with('success','password change successfully');
        }else{
            return Redirect()->back()->with('error','current password is Invalid');
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

                return Redirect()->back()->with('success','user profile updated succesfully');
            }else{
                return Redirect()->back();
            }
       
    }
}
