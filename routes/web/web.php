<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CaptchaServiceController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class);
Route::get('/temp/users', [UserController::class, 'indexTemp'])->name('users.temp.index');
Route::get('/contact-form', [CaptchaServiceController::class, 'index']);
Route::post('/captcha-validation', [CaptchaServiceController::class, 'capthcaFormValidate']);
Route::get('/user/approval/{id}', [UserController::class, 'userApproval'])->name('user.approval');
Route::get('/reload-captcha', [CaptchaServiceController::class, 'reloadCaptcha']);
Route::get('/user/first/reset', [UserController::class, 'firstReset'])->name('first.reset');
Route::post('/user/first/update', [UserController::class, 'firstResetUpdate'])->name('first.reset.update');

// Route::get('/userlist', [UserProfileController::class, 'userlist']);
// Route::get('/user_profile', [UserProfileController::class, 'userprofile']);
// Route::get('/pengasahan-pengguna-baharu', [UserController::class, 'newUserValidation']);
