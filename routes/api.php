<?php

use App\Http\Controllers\apicontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/data',[apicontroller::class,'index']);
Route::post('/photos',[apicontroller::class,'getphotos']);
Route::post('/register',[apicontroller::class,'register']);
Route::post('/login',[apicontroller::class,'login']);
