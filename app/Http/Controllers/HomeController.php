<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $products = Product::with('category')
            ->whereIn('id', function ($query) {
                $query->selectRaw('MIN(id)')
                    ->from('products')
                    ->groupBy('category_id');
            })
            ->get();
        return view("index",compact('products'));
    }


    public function cart(){
        return view("cart");
    }


    public function checkout(){
        return view("checkout");
    }


    public function productDetail(){
        return view("product-details");
    }


    public function shop(){
          $categories = Category::with('products')->get();
        $selectedCategory = null;

        return view('shop', compact('categories', 'selectedCategory'));
    }


    public function category($id)
    {
        $categories = Category::all(); // For sidebar

        // Find selected category with products
        $selectedCategory = Category::with('products')->find($id);

        if (!$selectedCategory) {
            return redirect()->route('shop.index')->with('error', 'Category not found!');
        }

        return view('shop', compact('categories', 'selectedCategory'));
    }


}
