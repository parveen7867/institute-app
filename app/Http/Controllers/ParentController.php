<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Guardian; 
class ParentController extends Controller
{
    
    function parentlogin(){
        return view('Auth.authlogin.parentlogin');
    }
    function storeparentlogin(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('guardian')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            $guardian = Auth::guard('guardian')->user(); 
            return redirect()->intended(route('parent.dashboard', ['id' => $guardian->id]))->with('success', "Logged in successfully");
        } else {
            return redirect()->back()->with('error', 'Not Registered');
        }}
    
    function addparent($id){
        $parent=Parent::find($id);
        return view('auth.addforms.parentadd',['parent'=>$parent]);
       }
       function parentstore(Request $request)
       {
           $request->validate([
               'name' => 'required',
               'address' => 'required|string|alpha|max:255',
               'password' => 'required|string|alpha|max:255',
               'pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
               'email' => 'required|email|max:255|unique:guardians', // Update here to use the 'guardians' table
               'number' => 'required|numeric|digits:10',
           ]);
       
           if ($request->hasFile('pic')) {
               $file_name = time() . '.' . $request->file('pic')->getClientOriginalExtension();
               $request->file('pic')->move('images/parent/', $file_name);
           } else {
               $file_name = null;
           }
       
           $parent = Guardian::create([
            'pic' => $file_name,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'number' => $request->number,
            'address' => $request->address,
            'updated_at' => now(), // Set 'updated_at' explicitly
        ]);
       
           if ($parent) {
               return redirect()
                   ->route('parent.login')
                   ->with('success', 'Parent Added Successfully');
           } else {
               if ($errors->has('email')) {
                   $error_message = $errors->first('email');
                   if (strpos($error_message, 'The email has already been taken')) {
                       return redirect()->back()->withErrors(['error' => 'Email address is already registered.']);
                   }
               }
               return redirect()->back()->withErrors($errors);
           }
       }
       function indexparent(){
        $parent=Guardian::all();
        return view('Auth.lists.parentlist',['parent'=>$parent]);
      }
    }       

