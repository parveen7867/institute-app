<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher; 

class TeacherController extends Controller
{
    function addteacher($id=null){
        $teacher=$id ? Teacher::find($id) :null;
        return view('auth.addforms.teacheradd',['teacher'=>$teacher]);
       }
       function storeteacher(Request $request)
       {
           $request->validate([
               'name' => 'required',
               'address' => 'required|string|alpha|max:255',
               'password' => 'required',
               'course'=>'required',
               'pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
               'email' => 'required|email|max:255|unique:teachers',
               'number' => 'required|numeric|digits:10',
           ]);
       
           if ($request->hasFile('pic')) {
               $file_name = time() . '.' . $request->file('pic')->getClientOriginalExtension();
               $request->file('pic')->move('images/teachers/', $file_name);
           } else {
               $file_name = null;
           }
       
           $teacher = Teacher::create([
               'pic' => $file_name,
               'name' => $request->name,
               'email' => $request->email,
               'number' => $request->number,
               'password' => Hash::make($request->password),
               'address' => $request->address,
               'course' => $request->course,

           ]);
       
           if ($teacher) {
               return redirect()
                   ->route('index.teacher')
                   ->with('success', 'teacher Added Successfully');
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
       function indexteacher(){
        $teacher=Teacher::all();
        return view('Auth.lists.teacherlist',['teacher'=>$teacher]);
      }

      function editteacher($id){
        $teacher=Teacher::find($id);
        return view('Auth/editblade.teacher',['teacher'=>$teacher]);
   }
   function updateteacher(Request $request, $id){
      
    $validate = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'number' => 'required|min:10',
        'pic' => 'required',
        'address' => 'required',
        'course' => 'required',

    ]);
  
    $teachers = Teacher::find($id); // Assuming you have an 'id' field in your teacher model
  
    if (!$teachers) {
        return redirect()->route('edit.teacher')->with('error', 'teacher not found');
    }
  
    if ($request->file('pic')) {
        $file_name = time() . "." . $request->pic->extension();
        $request->pic->move('images/teachers/', $file_name);
        $teachers->pic = $file_name;
    }
  
    $teachers->name = $request->name;
    $teachers->email = $request->email;
    $teachers->number = $request->number;
    $teachers->address = $request->address;
    $teachers->course = $request->course;
  
    if ($teachers->save()) {
        return redirect()->route('index.teacher', ['id' => $teachers->id])->with('success', 'Updated Successfully');
    } else {
        return redirect()->route('edit.teacher')->with('error', 'Not Updated');
    }
  }
  
   function deleteteacher(Request $request,$id){
       Teacher::where('id','=',$id)->delete($request->all());
       return redirect()->route('index.teacher');
     }

     function teacherview($id){
      $teacher =Teacher::find($id);
  
      if (!$teacher) {
          return redirect()->route('index.teacher')->with('error', 'teacher not found');
      }
  
      return view('auth.viewblades.teacherview', ['teacher' => $teacher]);
  }
}
