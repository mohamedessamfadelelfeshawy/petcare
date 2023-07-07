<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
Route::get('/subcategories/{id}', [App\Http\Controllers\SubCategoryController::class, 'index'])->name('subcategories');
Route::get('/vets', [App\Http\Controllers\UserController::class, 'vets'])->name('vets');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('/service', [App\Http\Controllers\ServiceController::class, 'index'])->name('service');
Route::get('/check', [App\Http\Controllers\ServiceController::class, 'check'])->name('check');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home'); //

    //cart
    Route::post('/add-to-cart', [App\Http\Controllers\CartController::class, 'create'])->name('cart.create'); //
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');//
    Route::put('/increase-items/{id}', [App\Http\Controllers\CartController::class, 'increaseItems'])->name('cart.increaseItems');//
    Route::put('/decrease-items/{id}', [App\Http\Controllers\CartController::class, 'decreaseItems'])->name('cart.decreaseItems');//
    Route::post('/confirm', [App\Http\Controllers\CartController::class, 'confirm'])->name('cart.confirm');//

    //booking
    Route::get('/booking', [App\Http\Controllers\BookingController::class, 'create'])->name('booking.create');//
    Route::post('/store-booking', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');//
    Route::post('/confirm-booking', [App\Http\Controllers\BookingController::class, 'confirm'])->name('booking.confirm');//
    Route::get('/my-booking', [App\Http\Controllers\BookingController::class, 'myBooking'])->name('booking.myBooking');//
    Route::get('/vet-booking', [App\Http\Controllers\BookingController::class, 'vetBooking'])->name('booking.vetBooking');//
    Route::PUT('/approve-booking/{id}', [App\Http\Controllers\BookingController::class, 'approve'])->name('booking.approve');//

    //user pet
    Route::get('/add-user-pet', [App\Http\Controllers\UserPetController::class, 'create'])->name('pet.create');
    Route::post('/store-user-pet', [App\Http\Controllers\UserPetController::class, 'store'])->name('pet.store');
    Route::delete('/delete-user-pet/{id}', [App\Http\Controllers\UserPetController::class, 'delete'])->name('pet.delete');

    //product
    Route::get('/add-product', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::post('/store-product', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('/my-products', [App\Http\Controllers\ProductController::class, 'myProducts'])->name('product.myProducts');
    Route::delete('/delete-product/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('product.delete');

    //user
    Route::put('/change-image/{id}', [App\Http\Controllers\UserController::class, 'changeImage'])->name('user.changeImage');
    Route::get('/edit-profile', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::put('/update-profile/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

});

