<?php

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

// Route::group(['middleware'=>['auth:sanctum']],
// function(){
// Route::get('/auth-login',[AuthController::class,'doLogin']);
// Route::get('/sign-in', function () {return view('sign_in');});
// // Route::get('/role-add',[RoleController::class,'add']);
// Route::get('/user/create',[UserController::class,'create']);
// Route::post('/user',[UserController::class,'store']);
// Route::resource('/role',RoleController::class);
// Route::resource('/user',UserController::class);
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
