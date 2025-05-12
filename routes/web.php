<?php

use App\Http\Controllers\controller1;
use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;


//kode baru diubah menjadi seperti ini
Route::get('/', [controller1::class, 'index'])->name('home');
Route::get('products', [controller1::class, 'products']);
Route::get('product/{slug}', [controller1::class, 'product']);
Route::get('categories',[controller1::class, 'categories']);
Route::get('category/{slug}', [controller1::class, 'category']);
Route::get('cart', [controller1::class, 'cart']);
Route::get('checkout', [controller1::class, 'checkout']);


Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'verified']], function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // Route untuk kategori
    Route::resource('categories', ProductCategoryController::class);
    Route::get('products',[DashboardController::class,'products'])->name('products');
    // Route resource untuk produk
    Route::resource('products', ProductController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});



require __DIR__.'/auth.php';
