<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\userAuthController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Route as RoutingRoute;

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

Route::redirect('/','/home');

Route::get('/home',[\App\Http\Controllers\homeController::class,'index'])->name('home');
//============user==================
Route::get('register',[userAuthController::class,'showregister'])->name('showregister');
Route::post('register',[userAuthController::class,'register'])->name('register');
Route::get('login',[userAuthController::class,'showlogin'])->name('showlogin');
Route::post('login',[userAuthController::class,'login'])->name('login');
Route::get('logout',[userAuthController::class,'logout'])->name('logout');

Route::group(['middleware'=>'userAuth'],function(){
    Route::get('upload',[userController::class,'showupload'])->name('showupload');
    Route::get('cashout',[userController::class,'showcashout'])->name('showcashout');
    Route::post('cashout',[userController::class,'cashout'])->name('cashout');
    Route::post('upload',[userController::class,'upload'])->name('upload');
    Route::get('myproduct',[userController::class,'myproduct'])->name('myproduct');
    Route::get('withdraw',[homeController::class,'withdraw'])->name('withdraw');
    Route::post('withdraw',[homeController::class,'payment'])->name('payment');
    Route::get('myproduct/{imageid}/sell',[\App\Http\Controllers\userController::class,'sellimage'])->name('sellimage');



});
route::get('/success',function(){
    return 'payment success';
});
route::get('/cancel',function(){
    return 'payment cancel';
});



//===================Admin=======================//
Route::group(['middleware'=>'adminAuth'],function(){
    Route::get('/admin/dashboard',[\App\Http\Controllers\AdminController::class,'index'])->name('admin');
    Route::get('/admin/approval',[\App\Http\Controllers\AdminController::class,'approval'])->name('approval');
    Route::get('/admin/approval/{imageid}/{status}',[\App\Http\Controllers\AdminController::class,'approvalproduct'])->name('approvalproduct');
    Route::get('/admin/buyout',[\App\Http\Controllers\AdminController::class,'showbuyout'])->name('showbuyout');
    Route::post('/admin/buyout',[\App\Http\Controllers\AdminController::class,'buyout'])->name('buyout');
    Route::get('/admin/showcashout',[\App\Http\Controllers\AdminController::class,'showcashout'])->name('admin.showcashout');
    Route::get('/admin/cashout/{cashoutid}/{status}',[\App\Http\Controllers\AdminController::class,'approvalcashout'])->name('approvalcashout');




});
Route::get('/admin/login',[\App\Http\Controllers\AdminController::class,'showAdminlogin'])->name('showAdminlogin');
Route::post('/admin/login',[\App\Http\Controllers\AdminController::class,'Adminlogin'])->name('Adminlogin');
Route::get('/admin/logout',[\App\Http\Controllers\AdminController::class,'Adminlogout'])->name('Adminlogout');


route::get('api',function(){
  return view('testApi');
});
Route::get('dataa',function(){
   return view('apidata');
});
