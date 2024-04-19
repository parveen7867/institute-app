<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Student; 

class StudentController extends Controller
{     

    function indexstudent(){
        $student=Student::all();
        return view('Auth.lists.studentlist',['student'=>$student]);
      }

    function studentlogin(){
        return view('Auth.authlogin.adminlogin');
    }
    
    function storestudentlogin(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('student')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            $student = Auth::guard('student')->user(); 
            return redirect()->intended(route('student.dashboard', ['id' => $student->id]))->with('success', "Logged in successfully");
        } else {
            return redirect()->back()->with('error', 'Not Registered');
        }}

    function studentdashboard()
    {
        $student =Student::all()->count();
    
        if (!$student) {
            return redirect()->route('student.login')->with('error', 'admin not found');
        }  
        return view('auth.dashboard.studentdashboard', ['student' => $student]);
        }
       // Providing a default value for $id
function addstudent($id = null) {
    $student = $id ? Student::find($id) : null;
    return view('auth.addforms.studentadd', ['student' => $student]);
}

          
       function studentstore(Request $request)
       {
           $request->validate([
               'name' => 'required',
               'address' => 'required|string|alpha|max:255',
               'password' => 'required_without:old_password|string|max:255',
               'course'=>'required',
               'pic' => 'required_without:old_pic|image|mimes:jpeg,png,jpg,gif|max:2048',
               'email' => 'required|email|max:255|unique:guardians', 
               'number' => 'required|numeric|digits:10',
           ]);
       
           if ($request->hasFile('pic')) {
               $file_name = time() . '.' . $request->file('pic')->getClientOriginalExtension();
               $request->file('pic')->move('images/students/', $file_name);
           } else {
               $file_name = null;
           }
       
           $student =Student::create([
            'pic' => $file_name,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'number' => $request->number,
            'address' => $request->address,
            'course' => $request->course,
        
        ]);
       
           if ($student) {
            return redirect()->route('index.student')->withInput($request->except(['password', 'pic']));
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
}
