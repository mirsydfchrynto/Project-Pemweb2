<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function products(){
        $products = Product::paginate(10); 
        return view('dashboard.products.index', compact('products'));
    }
}
