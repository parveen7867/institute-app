<?php

namespace App\Http\Controllers;

use App\Models\Institute; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import Hash for password hashing

class InstituteController extends Controller
{
    public function addinstitute($id)
    {
    $institute=Institute::find($id);
        return view('Auth.addforms.adminadd',['institute'=>$institute]);
    }
  
    function institutestore(Request $request)
    {
      $request->validate([
        'name' => 'required',
        'address' => 'required|string|alpha|max:255',
        'password' => 'required',
        'pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'email' => 'required|email|max:255|unique:institutes',
        'number' => 'required|numeric|digits:10',
      ]);
    
      if ($request->hasFile('pic')) {
        $file_name = time() . '.' . $request->file('pic')->getClientOriginalExtension();
        $request->file('pic')->move('images/institutes/', $file_name);
      } else {
        $file_name = null;
      }
    
      $institute = Institute::create([
        'pic' => $file_name,
        'name' => $request->name,
        'email' => $request->email,
        'number' => $request->number,
        'password' => Hash::make($request->password),
        'address' => $request->address,
      ]);
    
      if ($institute) {
        return redirect()
          ->route('admin.login')
          ->with('success', 'Institute Added Successfully');
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
    function indexadmin(){
      $institute=Institute::all();
      return view('Auth.lists.institutelist',['institute'=>$institute]);
    }
    function editinstitute($id){
      $institute=Institute::find($id);
      return view('Auth/editblade.institute',['institute'=>$institute]);
 }
 function updateinstitute(Request $request, $id){
    
  $validate = $request->validate([
      'name' => 'required',
      'email' => 'required',
      'number' => 'required|min:10',
      'pic' => 'required',
      'address' => 'required',
  ]);

  $institutes = Institute::find($id); // Assuming you have an 'id' field in your Institute model

  if (!$institutes) {
      return redirect()->route('edit.institute')->with('error', 'Institute not found');
  }

  if ($request->file('pic')) {
      $file_name = time() . "." . $request->pic->extension();
      $request->pic->move('images/institutes/', $file_name);
      $institutes->pic = $file_name;
  }

  $institutes->name = $request->name;
  $institutes->email = $request->email;
  $institutes->number = $request->number;
  $institutes->address = $request->address;

  if ($institutes->save()) {
      return redirect()->route('index.institute', ['id' => $institutes->id])->with('success', 'Updated Successfully');
  } else {
      return redirect()->route('edit.institute')->with('error', 'Not Updated');
  }
}

 function deleteinstitute(Request $request,$id){
     Institute::where('id','=',$id)->delete($request->all());
     return redirect()->route('index.institute');
   }
   function instituteview($id)
{
    $institute = Institute::find($id);

    if (!$institute) {
        return redirect()->route('index.institute')->with('error', 'institute not found');
    }

    return view('auth.viewblades.instituteview', ['institute' => $institute]);
}
  }