<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function list()
   {
        $products = Product::select('id', 'name', 'thumbnail', 'price','slug') 
        ->orderBy('created_at', 'desc') 
        ->paginate(5);
        return view("product_list",compact('products'));
   }

   public function show($slug)
   {
    $product = Product::with('pics')->where('slug', $slug)->firstOrFail();
    return view('product_detail', compact('product'));
   }
}
