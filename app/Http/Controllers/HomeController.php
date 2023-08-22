<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
   {
    $products = Product::select('id', 'name', 'thumbnail', 'price','slug') 
    ->orderBy('created_at', 'desc') 
    ->get();

     return view("home",compact('products'));
   }
}
