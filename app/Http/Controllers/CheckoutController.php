<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use Exception;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = session()->get('cart', []);
        return view('checkout',compact('cartItems'));
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'stripeToken' => 'required'
        ]);

        $cartItems = session()->get('cart');
        $totalAmount = 0;

        foreach ($cartItems as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        // Set your Stripe secret key
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        try{
        // Create a Stripe charge
        $charge = Charge::create([
            'amount' => $totalAmount * 100, // Stripe requires amount in cents
            'currency' => 'usd', // Change this to your desired currency
            'source' => $request->stripeToken, // Token obtained from Stripe.js
            'description' => 'Order payment',
        ]);

        // Save customer details to the database
        $customer = new Customer([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);
        $customer->save();

        $order = new Order([
            'customer_id' => $customer->id,
            'amount' => $totalAmount, 
        ]);
        $order->save();

        foreach ($cartItems as $item) {
            $orderProduct = new OrderProduct([
                'order_id' => $order->id,
                'product_id' => $item['product_id'], 
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
            $orderProduct->save();
        }

        return redirect()->route('checkout.success')->with('success', 'Payment successful!');
       }catch(Exception $e){
        return back()->withInput($request->all());
       }
    }

    public function confirm()
    {
        
        $cartItems = session()->get('cart');
        return view("confirm",compact('cartItems'));
    }
}
