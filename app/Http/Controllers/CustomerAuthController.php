<?php

namespace App\Http\Controllers; 
 
use Illuminate\Http\Request; 
use App\Models\Customer; 
 
class CustomerAuthController extends Controller 
{ 
    public function login() 
    { 
        return view('web.customer.login',[ 
            'title'=>'Login' 
        ]); 
    } 
 
    public function register() 
    { 
        return view('web.customer.register',[ 
            'title'=>'Register' 
        ]); 
    } 
} 
