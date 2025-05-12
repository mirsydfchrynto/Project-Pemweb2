<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class controller1 extends Controller
{

    public function index()
    {
        $categories = Categories::all();
        return view('components.web.homepage', [
            'categories' => $categories,
        ]);
    }

    public function products()
    {
        return view('components.web.products');
    }

    public function product($slug)
    {
        return view('components.web.product', ['slug' => $slug]);
    }

    public function categories()
    {
        return view('components.web.categories');
    }

    public function category($slug)
    {
        $category = Categories::find($slug);

        return view('components.web.category', ['slug' => $slug, 'category' =>
        $category]);
    }

    public function cart()
    {
        return view('components.web.cart');
    }

    public function checkout()
    {
        return view('components.web.checkout');
    }
}
