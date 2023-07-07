<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

use App\Http\Controllers\API\JWTAuthController;
 
Route::post('register', [JWTAuthController::class, 'register']); //
Route::post('login', [JWTAuthController::class, 'login']); //

Route::get('/categories', [App\Http\Controllers\API\CategoryController::class, 'index'])->name('categories'); //
Route::get('/subcategories/{id}', [App\Http\Controllers\API\SubCategoryController::class, 'index'])->name('subcategories'); //
Route::get('/products', [App\Http\Controllers\API\ProductController::class, 'index'])->name('products'); //
Route::get('/vets', [App\Http\Controllers\API\JwtAuthController::class, 'vets'])->name('vets'); //
Route::get('/check', [App\Http\Controllers\API\ServiceController::class, 'check'])->name('check');//


  
Route::group(['middleware' => 'auth.jwt'], function () {
    Route::post('logout', [JWTAuthController::class, 'logout']);

    Route::get('/cart', [App\Http\Controllers\API\CartController::class, 'index'])->name('cart'); //
    Route::post('/add-to-cart', [App\Http\Controllers\API\CartController::class, 'create'])->name('cart.create'); //
    Route::put('/increase-items', [App\Http\Controllers\API\CartController::class, 'increaseItems'])->name('cart.increaseItems'); //
    Route::put('/decrease-items', [App\Http\Controllers\API\CartController::class, 'decreaseItems'])->name('cart.decreaseItems'); //
    Route::post('/confirm', [App\Http\Controllers\API\CartController::class, 'confirm'])->name('cart.confirm');//

    Route::post('booking', [App\Http\Controllers\API\BookingController::class, 'store'])->name('booking.store');//
    Route::get('/my-booking', [App\Http\Controllers\API\BookingController::class, 'myBooking'])->name('booking.myBooking');//
    Route::get('/vet-booking', [App\Http\Controllers\API\BookingController::class, 'vetBooking'])->name('booking.vetBooking');//
    Route::PUT('/approve-booking', [App\Http\Controllers\API\BookingController::class, 'approve'])->name('booking.approve');//

    Route::get('/user-pets', [App\Http\Controllers\API\UserPetController::class, 'index'])->name('pet.index');//
    Route::post('/store-user-pet', [App\Http\Controllers\API\UserPetController::class, 'store'])->name('pet.store');//
    Route::delete('/delete-user-pet', [App\Http\Controllers\API\UserPetController::class, 'delete'])->name('pet.delete');//

    Route::post('/store-product', [App\Http\Controllers\API\ProductController::class, 'store'])->name('product.store');//
    Route::get('/my-products', [App\Http\Controllers\API\ProductController::class, 'myProducts'])->name('product.myProducts');//
    Route::delete('/delete-product', [App\Http\Controllers\API\ProductController::class, 'delete'])->name('product.delete');//

    Route::put('/change-image', [App\Http\Controllers\API\JwtAuthController::class, 'changeImage'])->name('user.changeImage');
    Route::put('/update-profile', [App\Http\Controllers\API\JwtAuthController::class, 'update'])->name('user.update');

    Route::get('/notifications', [App\Http\Controllers\API\NotificationController::class, 'index'])->name('notifications'); //
    Route::POST('/update-notifications', [App\Http\Controllers\API\NotificationController::class, 'updateNotifications'])->name('updateNotifications'); //

});