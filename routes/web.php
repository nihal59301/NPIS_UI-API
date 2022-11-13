<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserController;


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
    return view('login');
});
Route::get('/forget-password',[UserProfileController::class, 'forgetpassword']);
Route::get('/userlist', [UserProfileController::class, 'userlist']);
Route::get('/user_profile', [UserProfileController::class, 'userprofile']);
Route::get('/pengasahan-pengguna-baharu', [UserController::class, 'newUserValidation']);
 
