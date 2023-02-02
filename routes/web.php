<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontendController::class,'index']);
Route::get('/category',[FrontendController::class,'category']);
Route::get('view-category/{slug}',[FrontendController::class,'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}',[FrontendController::class,'productview']);
Route::get('product-list',[FrontendController::class,'productlistAjax']);
Route::post('searchproduct',[FrontendController::class,'searchProduct']);
    

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){

   Route::post('addtocart',[App\Http\Controllers\Frontend\CartController::class,'addProduct']);
  
   Route::get('cart',[CartController::class ,'viewcart']);
   Route::post('delete-cart-item',[CartController::class,'deleteproduct']);
   Route::post('update-cart',[CartController::class, 'updatecart']);
   Route::get('checkout',[CheckoutController::class ,'index']);
   Route::post('place-order',[CheckoutController::class,'placeorder']);

   Route::get('my-orders',[UserController::class ,'index']);
   Route::get('view-order/{id}',[UserController::class,'view']);
   Route::post('add-to-wishlist',[WishlistController::class,'add']);
   Route::post('/delete-wishlist-item',[WishlistController::class,'deleteitem']);
   Route::get('load-cart-data',[CartController::class ,'cartcount']);
   Route::get('load-wishlist-count',[WishlistController::class ,'wishlistcount']);

   Route::get('wishlist',[WishlistController::class,'index']);

   Route::post('add-rating',[RatingController::class,'add']);

   Route::get('add-review/{product_slug}/userreview',[ReviewController::class,'add']);
   Route::post('add-review',[ReviewController::class,'create']);

   Route::get('edit-review/{product_slug}/userreview',[ReviewController::class,'edit']);
   Route::put('update-review',[ReviewController::class,'update']);
   Route::post('proceed-to-pay',[CheckoutController::class,'razorpaycheck']);

  

});


 Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\Admin\FrontendController::class,'index']);
    Route::get('/categories', [App\Http\Controllers\Admin\CategoryController::class,'index']);
    Route::get('/add-category', [App\Http\Controllers\Admin\CategoryController::class,'add']);
    Route::post('/insert-category', [App\Http\Controllers\Admin\CategoryController::class,'insert']);
    Route::get('/edit-category/{id}', [App\Http\Controllers\Admin\CategoryController::class,'edit']);
    Route::put('/update-category/{id}', [App\Http\Controllers\Admin\CategoryController::class,'update']);
    Route::get('/delete-category/{id}', [App\Http\Controllers\Admin\CategoryController::class,'destroy']);


    Route::get('/product', [App\Http\Controllers\Admin\ProductController::class,'index']);
    Route::get('/add-product', [App\Http\Controllers\Admin\ProductController::class,'add']);
    Route::post('/insert-product', [App\Http\Controllers\Admin\ProductController::class,'insert']);
    Route::get('/ edit-product/{id}', [App\Http\Controllers\Admin\ProductController::class,'edit']);
    Route::put('/update-product/{id}', [App\Http\Controllers\Admin\ProductController::class,'update']);
    Route::get('/delete-product/{id}', [App\Http\Controllers\Admin\ProductController::class,'destroy']);

   //  Route::get('/users', [FrontendController::class,'users']);

    Route::get('/orders', [OrderController::class,'index']);
    Route::get('admin/view-order/{id}', [OrderController::class,'view']);
    Route::put('update-order/{id}', [OrderController::class,'updateorder']);
    Route::get('/order-history', [OrderController::class,'orderhistory']);

    Route::get('/users', [DashboardController::class,'users']);
    Route::get('/view-users/{id}', [DashboardController::class,'viewuser']);

   

    

    
 });
