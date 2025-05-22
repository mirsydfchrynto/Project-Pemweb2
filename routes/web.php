<?php

use App\Http\Controllers\controller1;
use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerAuthController;


//kode baru diubah menjadi seperti ini
Route::get('/', [controller1::class, 'index'])->name('home');
Route::get('products', [controller1::class, 'products']);
Route::get('product/{slug}', [controller1::class, 'product']);
Route::get('categories', [controller1::class, 'categories']);
Route::get('category/{slug}', [controller1::class, 'category']);
Route::get('cart', [controller1::class, 'cart']);
Route::get('checkout', [controller1::class, 'checkout']);

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('categories', ProductCategoryController::class);
    Route::resource('products', ProductController::class);

    // Route::get('products',[DashboardController::class,'products'])->name('products');


})->middleware(['auth', 'verified']);


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::group(['prefix' => 'customer'], function () {
    Route::controller(CustomerAuthController::class)->group(function () {
        Route::group(['middleware' => 'check_customer_login'], function () {
            //tampilkan halaman login 
            Route::get('login', 'login')->name('customer.login');

            //aksi login 
            Route::post('login', 'store_login')->name('customer.store_login');

            //tampilkan halaman register 
            Route::get('register', 'register')->name('customer.register');

            //aksi register 
            Route::post('register', 'store_register')->name('customer.store_register');
        });


        //aksi logout 
        Route::post('logout', 'logout')->name('customer.logout');
    });
});

require __DIR__ . '/auth.php';
