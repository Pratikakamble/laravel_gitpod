<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function Login(Request $request){
    	if(\Auth::attempt($request->only('email', 'password'))){
    		if(Auth::user()->role == 1){
    			return redirect('admin/dashboard');
    		}else{
    			return redirect('/home');
    		}
    	}else{
    		return redirect()->back()->with('error', 'Login Failed');
    	}
    }
}
