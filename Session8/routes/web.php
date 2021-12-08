<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/PHP-INSERT', function () {
//     return view('PhpInsert.User');
// });
Route::get('/menu', function () {
    return view('menu_new');
});
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/user-auth',function () {
    return view('login_user');
});
Route::get('/role-auth',function () {
    return view('login_role');
});


Route::get('/user-login',[AuthController::class,'LoginUser']);
Route::get('/role-login',[AuthController::class,'LoginRole']);
Route::get('/user-destroy',[AuthController::class,'DestroyRole']);
Route::get('/role-destroy',[AuthController::class,'DestroyUser']);


// Route::get('/auth-login',[AuthController::class,'doLogin']);
Route::get('/sign-in', function () {return view('sign_in');});
// Route::get('/role-add',[RoleController::class,'add']);
 Route::get('/user/create',[UserController::class,'create']);
 Route::post('/user',[UserController::class,'store']);

 Route::get('/welcome',[UserController::class,'index']);
Route::get('/welcome_new',function(){
    return view('welcome_new');
});
Route::resource('/role',RoleController::class);
Route::resource('/user',UserController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

