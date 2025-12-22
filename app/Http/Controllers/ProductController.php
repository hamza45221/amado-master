<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function view(){
        $products = Product::all();
        return view("admin.product.view",compact("products"));
    }


        public function create(){
            $category = Category::all();
        return view("admin.product.create",compact("category"));
    }


    public function store(Request $request){
        $product = new Product();
        $product->name =$request->name;
        $product->description =$request->description;
        $product->price =$request->price;
        $product->currency=$request->currency;

        $product->reviews=$request->reviews;
        $product->color=$request->color;
        $product->brand=$request->brand;
        $product->availibility=$request->availibility;
        $product->offer=$request->offer;
        $product->discount=$request->discount;

if ($request->hasFile('images')) {

    $imagePaths = [];

    foreach ($request->file('images') as $image) {
        $path = $image->store('uploads', 'public');
        $imagePaths[] = 'storage/' . $path;
    }

    $product->images = json_encode($imagePaths);
}




        $product->save();


        return redirect(route('product.view'))->with("success","Data Store Successfully...");
    }



    public function delete($id){
        $delete = Product::find($id);
        if($delete){
            $delete->delete();

            return redirect()->back()->with("success","Data Deleted Successfully...");
        }
        return redirect()->back()->with("error","Data not found...");
    }

    public function edit($id){
        $edit = Product::find($id);
        $category = Category::all();
        return view('admin.product.update',compact('edit','category'));
    }


    public function update(Request $request, $id){
        $product = Product::find($id);
        $product->name =$request->name;
        $product->description =$request->description;
        $product->price =$request->price;
        $product->currency=$request->currency;

        $product->reviews=$request->reviews;
        $product->color=$request->color;
        $product->brand=$request->brand;
        $product->availibility=$request->availibility;
        $product->offer=$request->offer;
        $product->discount=$request->discount;

        if ($request->hasFile('images')) {

            $imagePaths = [];

            foreach ($request->file('images') as $image) {
                $path = $image->store('uploads', 'public');
                $imagePaths[] = 'storage/' . $path;
            }

            $product->images = json_encode($imagePaths);
        }




        $product->update();


        return redirect(route('product.view'))->with("success","Data Update Successfully...");
    }

}
