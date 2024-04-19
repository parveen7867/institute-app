<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    function index()
  {
   return view('Tickets.add_tkt');

  }
  function addtkt(Request $request)
  {
    //  $validate = $request->validate([
    //   ''=>'required',
    //   'description'=>'required | min:10',
    //   'status'=>'required'
    //  ]);
     $ticket = Ticket::create([
      'details'=>$request->details,
      'user' =>$request->user,
      'status' => $request->status
     
     
      
     ]);
     //dd($request);
      if($ticket ){
         return redirect()
                ->route('tickets')
                ->with('success','Ticket Added Sulccessfully');
      }else{
         return redirect()
                ->back()
                ->with('error','Ticket Not Added...');

      }
  }
  function  list(){
   $tickets = Ticket::all();

 return view('Tickets.self_tickets',['tickets'=>$tickets]);
}


function edit($id){
   $ticket=Ticket::find($id);
   return view('Tickets.edit',['tickets'=>$ticket]); 
   
}
  function update(Request $request){
   $ticket = Ticket::find($request->id);
   $ticket->user = $request->user;
       $ticket->details = $request->details;
       $ticket->status = $request->status;
      
       if($ticket->save()){
         return redirect()->route('tickets')->with('success','Updated Successfully');
      }else{
         return redirect()->route('edit.cate')->with('error','Not Updated');
      }
  }

  function delete(Request $request, $id){
   Ticket::where('id','=',$id)->delete($request->all());
   return redirect()->route('tickets')->with('success1','Deleted Successfully');
}
}
