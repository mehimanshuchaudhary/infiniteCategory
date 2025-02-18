<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    public function category(){
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('user.category',compact('categories'));
    }

    public function product(){
        $products = Product::with('categories')->get();
        $categories = Category::with('children')->get();
        return view('user.product', compact('products', 'categories'));
    }
}
