<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
       
        $cartItems = session()->get('cart', []);
        return view("cart",compact("cartItems"));
    }

    public function addToCart(Request $request)
    {
       
        $productId = $request->input('product_id');
        $product = Product::find($productId);
    
        if ($product) {
            $cart = session()->get('cart', []);
    
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] += $request->qty;
            } else {
                $cart[$productId] = [
                    'product_id' => $productId,
                    'name' => $product->name,
                    'price' => $product->price,
                    'slug' => $product->slug,
                    'quantity' => $request->qty,
                    'thumbnail' => asset('storage/'.$product->thumbnail),
                ];
            }
    
            session()->put('cart', $cart);
        }
    
        return redirect()->route('cart.index');
    }
    
}
