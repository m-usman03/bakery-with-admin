<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        if (Auth::attempt($data) ){  
             return redirect()->route('admin.product.index');          
        }else{
            return back()->with('message','Invalid User');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login_form');
    }
}
