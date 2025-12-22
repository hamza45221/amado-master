<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function view(){
        $categories = Category::all();
        return view("admin.category.view",compact("categories"));
    }


    
    public function create(){
        return view("admin.category.create");
    }


    public function store(Request $request){
        $cat = Category::create($request->all());
        return redirect(route('category.view'))->with("success","Data Store Successfully...");
    }


    public function delete($id){

        $cat = Category::find($id);
        if($cat){
            $cat->delete();

            return redirect()->back()->with("success","Data Deleted Successfully...");
        }else{
            return redirect()->back()->with("error","Row not found...");
        }
    }


     public function edit($id)
{
    $category = Category::find($id);

    if (!$category) {
        return redirect()->back()->with('error', 'Category not found!');
    }

    return view('admin.category.update', compact('category'));
}

public function update(Request $request, $id)
{
  
    $cat = Category::find($id);
    if (!$cat) {
        return redirect()->back()->with('error', 'Category not found!');
    }
    $cat->name = $request->name;
    $cat->brand_name = $request->brand_name;
    $cat->description = $request->description;
    $cat->save();

    return redirect()->route('category.view')->with("success", "Data Updated Successfully...");
}


}
