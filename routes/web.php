<?php

use Illuminate\Support\Facades\Route;
//>>>>  CONTROLLER CLIENT  <<<<
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
//>>>>  CONTROLLER ADMIN  <<<<
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCateController;
use App\Http\Controllers\AdminProController;
use App\Http\Controllers\AdminUserController;

/*
|--------------------------------------------------------------------------
|                                   Client
|--------------------------------------------------------------------------
*/
Route::get('/',[Controller::class,'index']);
// >>>>>  STATIC PAGE  <<<<<
Route::get('/home',[Controller::class,'index']);
Route::get('/contact',[Controller::class,'contactUs']);
Route::get('/blog',[Controller::class,'blog']);
// Route::get('/login',[Controller::class,'login']);
Route::get('/register',[Controller::class,'register']);
Route::get('/emptyCart',[Controller::class,'emptyCart']);
Route::get('/faq',[Controller::class,'faq']);
// Route::get('/cart',[Controller::class,'cart']);
Route::get('/checkout',[Controller::class,'checkout']);
Route::get('/aboutus',[Controller::class,'aboutus']);
Route::get('/404',[Controller::class,'page404']);
// >>>>>  hasDATA PAGE  <<<<<
Route::get('/shop',[ProductController::class,'shop']);
Route::get('/mostViewed',[ProductController::class,'mostViewed']);
Route::get('/newProduct',[ProductController::class,'newProduct']);
Route::get('/hotProduct',[ProductController::class,'hotProduct']);
Route::get('/shopCate/{id}',[ProductController::class,'shopCate']);
Route::get('/product/{id}',[ProductController::class,'singleProduct']);

// >>>>>  Add Cart  <<<<<
Route::get('/addToCart/{id}/{soluong}', [ProductController::class,'addToCart']);
Route::get('/cart', [ProductController::class,'showCart']);
Route::get('/delProductInCart/{id}', [ProductController::class,'delProductInCart']);
Route::get('/deleteAllCart', [ProductController::class,'deleteAllCart']);




// >>>>>  LOGIN  <<<<<
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login', [UserController::class,'login_']);

Route::get('/register', [UserController::class,'register']);
Route::post('/register', [UserController::class,'register_']);

Route::get('/notif', [UserController::class,'notif']);

Route::get('/logout', [UserController::class,'logout']);

// >>>>>  404 PAGE  <<<<<
Route::fallback(function () {
    return view('client.404');
});
/*
|--------------------------------------------------------------------------
|                                   Admin
|--------------------------------------------------------------------------
*/
// Route::get('/admin',[AdminController::class,'index']);
// Route::get('/admin/list',[AdminController::class,'list']);
Route::group(['prefix' => 'admin', 'middleware' => 'adminauth'], function() {
    Route::get('/', [AdminController::class,'index'])->name('admin');
    Route::resource('cate', AdminCateController::class)->names([
        'index' => 'admin.cate.index',
        'create' => 'admin.cate.create',
        'store' => 'admin.cate.store',
        'show' => 'admin.cate.show',
        'edit' => 'admin.cate.edit',
        'update' => 'admin.cate.update',
        'destroy' => 'admin.cate.destroy',
    ]);
    Route::resource('pro',AdminProController::class)->names([
        'index' => 'admin.pro.index',
        'create' => 'admin.pro.create',
        'store' => 'admin.pro.store',
        'show' => 'admin.pro.show',
        'edit' => 'admin.pro.edit',
        'update' => 'admin.pro.update',
        'destroy' => 'admin.pro.destroy',
    ]);
    Route::resource('user',AdminUserController::class)->names([
        'index' => 'admin.user.index',
        'create' => 'admin.user.create',
        'store' => 'admin.user.store',
        'show' => 'admin.user.show',
        'edit' => 'admin.user.edit',
        'update' => 'admin.user.update',
        'destroy' => 'admin.user.destroy',
    ]);
});


