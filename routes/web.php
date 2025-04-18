<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controller1; 

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [controller1::class, 'index']); 
Route::get('products', [controller1::class, 'products']); 
Route::get('product/{slug}', [controller1::class, 'product']); 
Route::get('categories',[controller1::class, 'categories']); 
Route::get('category/{slug}', [controller1::class, 'category']); 
Route::get('cart', [controller1::class, 'cart']); 
Route::get('checkout', [controller1::class, 'checkout']); 
