<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Guardian;

class AuthController extends Controller
{     
    function parentdashboard($id)
    {
        $guardian = Guardian::find($id);

        if (!$guardian) {
            return redirect()->route('parent.login')->with('error', 'Guardian not found');
        }

        return view('auth.dashboard.parentdashboard', ['guardian' => $guardian]);
    }
    function index()
    {
        return view('auth.Login');
    }
    
    function login(Request $request)
    {
       // dd($request);
        $validate = $request->validate(

            [
                
                'email'=>'required|email',
                'password'=>'required'
                
            ]
            );
           
            if(Auth::attempt([
                'email'=>$request->email,
                'password'=>$request->password
               
            ])){
              return redirect()->intended('tktlist')->with('success',"loged in successfully");
            }else{
              return redirect()->back()->with('error','Not Registered');
            }

          
    }
    function teacherstorelogin(Request $request) {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (Auth::guard('teacher')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            $teacher = Auth::guard('teacher')->user(); 
            return redirect()->intended(route('teacher.dashboard', ['id' => $teacher->id]))->with('success', "Logged in successfully");
        } else {
            return redirect()->back()->with('error', 'Not Registered');
        }
    }
    function adminregistration()
    {
       return view('auth.Regist');
    }
    function createregs(Request $request)
    {
       //dd($request);
        
       $validate = $request->validate(

        [
            'name'=>"required|max:8",
            'email'=>"required|unique:users,email",
            'password'=>"required|min:8",
            'confirm_password'=>"required|same:password"
        ]
        );
        
     $user =   User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
           
        ]);
   if($user){
    return redirect()
        ->back()
        ->with('success','User registered succesfullly');
        

   }
}
}
