<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Institute;
use App\Models\Guardian;
use App\Models\Teacher;

class AuthenticationController extends Controller
{  

    function logout(){
        return view('Auth.Auth_role.role');
    }
    function  role(){
        return view('Auth.Auth_role.role');
    }

    function getPage($page)
    {
        
    
        switch ($page) {
            case 'page1':
                return view('Auth.authlogin.Login');
            case 'page2':
                return view('Auth.authlogin.adminlogin');
            case 'page3':
                return view('Auth.authlogin.teacherlogin');
            case 'page4':
                return view('Auth.authlogin.studentlogin');
            case 'page5':
                return view('Auth.authlogin.parentlogin');
            case 'page6':
                return view('Auth.authlogin.accountant');
            case 'page7':
                if (view()->exists('Auth.authlogin.librarian')) {
                    return view('Auth.authlogin.librarian');
                } else {
                    return response()->view('errors.404', [], 404);
                }
            default:
                return view('Auth.layouts.admin'); // Redirect to the admin layout if the page is not found
        }
    }
    
    
    function adminlogin(){
        return view('Auth.authlogin.adminlogin');
    }
     
    function store_admin(Request $request) {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (Auth::guard('institute')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            $institute = Auth::guard('institute')->user(); 
            return redirect()->intended(route('admin.dashboard', ['id' => $institute->id]))->with('success', "Logged in successfully");
        } else {
            return redirect()->back()->with('error', 'Not Registered');
        }
    }
}

    function adminregister(){
        return view('Auth.register.adminregister');
    }


    
    function teacherlogin(){
        return view('Auth.authlogin.teacherlogin');
    }
   

    function teacherregister(){
        return view('Auth.register.teacherregister');
    }
   
    function studentregister(){
        return view('Auth.register.studentregister');
    }
    
    function parentregister(){
        return view('Auth.register.parentsregister');
    }
   
    function librarianregister(){
        return view('Auth.register.librarian');
    }
    
    function accountantregister(){
        return view('Auth.register.accountant');
    }
    function layout(){
        return view('auth.layouts.admin');
    }
    
