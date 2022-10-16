<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function check(Request $request){
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:8|max:30'
        ],[
            'email.exists'=>'This email is not exists on admins table'
        ]);
        $creds = $request->only('email','password');
        if(Auth::guard('admin')->attempt($creds) ){
            return redirect()->route('admin.home')->with('success', 'You are now loged in successfully');
        }else{
            return redirect()->route('admin.login')->with('fail', 'Incorrect credentials');
        }

    }
    function Profile(){
        return view('Dashboards.admin.profile.edite') ;
    }
    function ProfileName(Request $request){
        return view('Dashboards.admin.profile.editeName') ;
    }
    function ChangeProfileName(Request $request){
        $profile=Auth::user();
        $profile->name=$request->name;
        if( $profile->update() ){
            return redirect()->route('admin.profile')->with('success','name updated!');
         }else{
             return redirect()->route('admin.profile')->with('fail','name update failed');
         }
    }
    function ProfileEmail(Request $request){
        return view('Dashboards.admin.profile.editeEmail') ;
    }
    function ChangeProfileEmail(Request $request){
        $request->validate([
            'email'=>['required', 'string', 'email', 'max:255', 'unique:users','unique:admins'],
            'password'=>'required|min:8|max:30'
         ]);
        $profile=Auth::user();
        if(Hash::check(   $request->password,$profile->password)){
            $profile->email=$request->email;
            if( $profile->update() ){
                return redirect()->route('admin.profile')->with('success','email updated!');
            }else{
                return redirect()->back()->with('fail','email update failed');
            }
        }else{
            return redirect()->back()->with('fail','wrong password');
        }
        }
        function ProfilePassword(Request $request){
            return view('Dashboards.admin.profile.editePassword') ;
        }
        function ChangeProfilePassword(Request $request){
            $request->validate([
                'OldPassword'=>'required|min:8|max:30',
                'password'=>'required|min:8|max:30',
                'password_confirmation' => 'required|same:password|min:6'
             ]);
            $profile=Auth::user();
            if(Hash::check($request->OldPassword,$profile->password)){
                $profile->password=Hash::make($request->password);
                if( $profile->update() ){
                    return redirect()->route('admin.profile')->with('success','password updated!');
                }else{
                    return redirect()->back()->with('fail','password update failed');
                }
            }else{
                return redirect()->back()->with('fail','wrong OldPassword');
            }
            }
        function logout(){
            Auth::guard('admin')->logout();
            return redirect('/');
        }
}
