<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    function getForm (){
        $categories= Category::all();
        
        return view('Dashboards.admin.Category.form',compact('categories')) ;
    }
    function AddCategory(Request $request){
        $request->validate([
            'titre' => ['required', 'string', 'max:255','unique:categories'],
         ]);
        $category=new Category();
        $category->titre=$request->titre;
        if($category->save()){
            return redirect()->back()->with('success', 'category was added successfully');
        }else
        {
            return redirect()->back()->with('fail', ' add category was failed!');
        }
    }
    function Destroy($id){
        $category=Category::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'category was deleted successfully');
    }
    function GetCategoryById($id){
        $category=Category::find($id);
        return view('Dashboards.admin.Category.edit',compact('category')) ;
    }
    function UpdateCategoryById($id ,Request $request){
        $category=Category::find($id);
        $category->update([
            'titre'=>$request->titre,
        ]);
        if($category->save()){
            return redirect()->route('admin.addCategory')->with('success', 'category was updated successfully');
        }
        else{
            return redirect()->back()->with('fail', ' update category was failed!');
        }
    }
    function searchCategory(Request $request){
        $search_text = $request->input('query');
        $categories = DB::table('categories')
        ->where('titre','LIKE','%'.$search_text.'%')->get();
         return view('Dashboards.admin.Category.form',['categories'=>$categories],compact('categories')); 
    
    }
}
