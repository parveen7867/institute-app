<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Librarian; 

class LibrarianController extends Controller
{
    function addlibrarian(){
        return view('auth.addforms.librarianadd');
       }
       function librariandashboard($id)
       {
           $librarian =Librarian::find($id);
       
           if (!$librarian) {
               return redirect()->route('librarian.login')->with('error', 'admin not found');
           }  
           return view('auth.dashboard.librariandashboard', ['librarian' => $librarian]);
           }
           function storelibrarian(Request $request)
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
                   $request->file('pic')->move('images/librarians/', $file_name);
               } else {
                   $file_name = null;
               }
           
               $librarian =Librarian::create([
                'pic' => $file_name,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'number' => $request->number,
                'address' => $request->address,
              
            
            ]);
           
               if ($librarian) {
                   return redirect()
                       ->route('librarian.login')
                       ->with('success', 'librarian Added Successfully');
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
           function librarianlogin(){
            return view('Auth.authlogin.librarian');
        }
         
               function storelibrarianlogin(Request $request) {
                $validate = $request->validate([
                    'email' => 'required|email',
                    'password' => 'required'
                ]);
            
                if (Auth::guard('librarian')->attempt([
                    'email' => $request->email,
                    'password' => $request->password,
                ])) {
                    $librarian = Auth::guard('librarian')->user(); 
                    return redirect()->intended(route('librarian.dashboard', ['id' => $librarian->id]))->with('success', "Logged in successfully");
                } else {
                    return redirect()->back()->with('error', 'Not Registered');
                }
            }
}
