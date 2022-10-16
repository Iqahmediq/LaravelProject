<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
        function getForm (){
                $categories=Category::all();
                return view('Dashboards.admin.product.form',compact('categories')) ;
            }

        function store(Request $request){

        $product= new Product();
        $product-> name=$request->name;
        $product-> prix=$request->prix;
        $product-> reference=$request->reference; 
        $product-> Qte=$request->Qte;
        $product-> category=$request->category;
        $product-> description=$request->description;
        if($request->file("image")){
            $file = $request->file("image");
            $destinationPath = 'ahmed1/';
            $file->move($destinationPath,$file->getClientOriginalName());
            $product->image=$file->getClientOriginalName();
        }
        if( $product->save() ){
    
         return redirect()->back()->with('success','Product added');
      }else{
          return redirect()->back()->with('fail','product failed');
      }
    
    }
    function getListProduct (){
        $products=Product::all();
        return view('Dashboards.admin.product.ListProduct',compact('products')) ;
    }
    function Destroy($id){
        $product=Product::find($id);
        $product->delete();
        return redirect()->back()->with('success', 'product was deleted successfully');
    }
    function GetProductById($id){
        $categories=Category::all();
        $product=Product::find($id);
        return view('Dashboards.admin.product.edit',compact('product','categories')) ;
    }
    function UpdateProductById($id ,Request $request){
        $product=Product::find($id);
        $product-> name=$request->name;
        $product-> prix=$request->prix;
        $product-> reference=$request->reference; 
        $product-> Qte=$request->Qte;
        $product-> category=$request->category;
        $product-> description=$request->description;
        if($request->file("image")){
            $file = $request->file("image");
            $destinationPath = 'ahmed1/';
            $file->move($destinationPath,$file->getClientOriginalName());
            $product->image=$file->getClientOriginalName();
        }
        if( $product->update() ){
    
         return redirect()->route('admin.ListProduct')->with('success','Product updated!');
      }else{
          return redirect()->route('admin.ListProduct')->with('fail','product update failed');
      }
    
        
    }    
}
