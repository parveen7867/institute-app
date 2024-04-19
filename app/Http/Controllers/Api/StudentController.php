<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function indexstudent(){
        $student=Student::all();
        return view('Auth.lists.studentlist',['student'=>$student]);
      }
}
