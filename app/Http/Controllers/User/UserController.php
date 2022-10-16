<?php
namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create (Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/[a-z]/'],
         ]);
         $user = new User();
         $user->name = $request->name;
         $user->email = $request->email; 
         $user->password = Hash::make($request->password);
         $save = $user->save();
         if($save){
             return redirect()->back()->with('success', 'You are now registered successfully');
         }else{
             return redirect()->back()->with('fail', 'Something went wrong, failed to register'); 
         }
     }
        function check(Request $request){
            $request->validate([
                'email'=>'required|email|exists:users,email',
                'password'=>'required|min:8|max:30'
            ],[
                'email.exists'=>'This email is not exists on users table'
            ]);
            $creds = $request->only('email','password');
            if(Auth::guard('web')->attempt($creds) ){
                return redirect()->route('user.home')->with('success', 'You are now loged in successfully');
            }else{
                return redirect()->route('user.login')->with('fail', 'Incorrect credentials');
            }

        }
        function Profile(){
            return view('Dashboards.user.Profile.edite') ;
        }
        function ProfileName(Request $request){
            return view('Dashboards.user.Profile.editeName') ;
        }
        function ChangeProfileName(Request $request){
            $profile=Auth::user();
            $profile->name=$request->name;
            if( $profile->update() ){
                return redirect()->route('user.profile')->with('success','name updated!');
             }else{
                 return redirect()->route('user.profile')->with('fail','name update failed');
             }
        }
        function ProfileEmail(Request $request){
            return view('Dashboards.user.Profile.editeEmail') ;
        }
        function ChangeProfileEmail(Request $request){
            $request->validate([
                'email'=>['required', 'string', 'email', 'max:255', 'unique:users','unique:users'],
                'password'=>'required|min:8|max:30'
             ]);
            $profile=Auth::user();
            if(Hash::check(   $request->password,$profile->password)){
                $profile->email=$request->email;
                if( $profile->update() ){
                    return redirect()->route('user.profile')->with('success','email updated!');
                }else{
                    return redirect()->back()->with('fail','email update failed');
                }
            }else{
                return redirect()->back()->with('fail','wrong password');
            }
            }
            function logout(){
                Auth::guard('web')->logout();
                return redirect('/');
            }
            function home (){
                $products=Product::all();
                return view('Dashboards.user.home',compact('products')) ;
            }
}