<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Institute;
use App\Models\Teacher;
class AdminController extends Controller
{
 
   function layout(){
    return view('auth.layouts.admin');
}
function welcome(){
    return view('welcome');
}
function admindashboard($id)
{
    $institute =Institute::find($id);

    if (!$institute) {
        return redirect()->route('admin.login')->with('error', 'admin not found');
    }  
    return view('auth.dashboard.admindashboard', ['institute' => $institute]);
    }

    function teacherdashboard($id)
   {
       $teacher =Teacher::find($id);
   
       if (!$teacher) {
           return redirect()->route('teacher.login')->with('error', 'admin not found');
       }  
       return view('auth.dashboard.teacherdashboard', ['teacher' => $teacher]);
       }
      function dashboard(){
        return view('auth.dashboard.dashboard');
      }
     
    }
    
    

          


