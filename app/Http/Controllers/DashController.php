<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class DashController extends Controller
{
    
    function catelist(){
        $categories = Category::all();
        return view('categories.catelist',['categories'=>$categories]);
    }
    function addcate(){
        return view('categories.addcate');
    }
    function storecate(Request $request){
        $categories=Category::create([
            'cate_name'=>$request->name,
        ]);
        
        if($categories ){
            return redirect()
                   ->route('cate.list')
                   ->with('success','Ticket Added Sulccessfully');
    }
}
    function productlist(){
        $products = Product::all();
        $categories = Category::all();
        return view('products.prolist',['products'=>$products,'categories'=>$categories]);
    }
    function addproduct(){
 
        $categories = Category::all();
        
        return view('products.addproduct',['categories'=>$categories]);
    }
    function edit($id){
        $categories=Category::find($id);
        return view('categories.edit',['categories'=>$categories]); 
        
     }
       function update(Request $request){
        $categories = Category::find($request->id);
        $categories->cate_name=$request->name;
           
            if($categories->save()){
              return redirect()->route('cate.list')->with('success','Updated Successfully');
           }
       }
     
       function delete(Request $request, $id){
        Category::where('id','=',$id)->delete($request->all());
        return redirect()->route('cate.list')->with('success1','Deleted Successfully');
     }

     function storepro(Request $request){
        $products=Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'cate_id'=>$request->cate_id,
            'price'=>$request->price,
        ]);
        
        if($products ){
            return redirect()
                   ->route('list.product')
                   ->with('success','product Added Sulccessfully');
    }
}
function editpro($id){
    $products=Product::find($id);
    $categories=Category::find($id);

    return view('products.edit.pro',['products'=>$products,'categories'=>$categories]); 
    
 }
   function updatepro(Request $request){
    $products = Product::find($request->id);
    $products->name=$request->name;
    $products->description=$request->description;
    $products->cate_id=$request->cate_id;
    $products->price=$request->price;

       
        if($products->save()){
          return redirect()->route('list.product')->with('success','Updated Successfully');
       }
   }
 
   function deletepro(Request $request, $id){
    Product::where('id','=',$id)->delete($request->all());
    return redirect()->route('list.product')->with('success1','Deleted Successfully');
 }

}
