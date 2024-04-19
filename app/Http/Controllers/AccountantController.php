<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Accountant; 

class AccountantController extends Controller
{
    function addaccountant(){
        return view('auth.addforms.accountantadd');
       }
       function storeaccountant(Request $request)
       {
           $request->validate([
               'name' => 'required',
               'address' => 'required|string|alpha|max:255',
               'password' => 'required|string|alpha|max:255',
               'pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
               'email' => 'required|email|max:255|unique:guardians', 
               'number' => 'required|numeric|digits:10',
           ]);
       
           if ($request->hasFile('pic')) {
               $file_name = time() . '.' . $request->file('pic')->getClientOriginalExtension();
               $request->file('pic')->move('images/accountants/', $file_name);
           } else {
               $file_name = null;
           }
       
           $accountant =Accountant::create([
            'pic' => $file_name,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'number' => $request->number,
            'address' => $request->address,
          
        
        ]);
       
           if ($accountant) {
               return redirect()
                   ->route('accountant.login')
                   ->with('success', 'accountant Added Successfully');
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
       function accountantdashboard($id)
       {
           $accountant =Accountant::find($id);
       
           if (!$accountant) {
               return redirect()->route('accountant.login')->with('error', 'admin not found');
           }  
           return view('auth.dashboard.accountantdashboard', ['accountant' => $accountant]);
           }
           function accountantlogin(){
            return view('Auth.authlogin.accountant');
        }
           function storeaccountantlogin(Request $request) {
            $validate = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
        
            if (Auth::guard('accountant')->attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])) {
                $accountant = Auth::guard('accountant')->user(); 
                return redirect()->intended(route('accountant.dashboard', ['id' => $accountant->id]))->with('success', "Logged in successfully");
            } else {
                return redirect()->back()->with('error', 'Not Registered');
            }
        }
}
