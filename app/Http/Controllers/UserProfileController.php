<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function home(){
        return view('home');
    }
    public function forgetpassword(){
        return view('user_forget_pass');
    }
    public function userlist(){
        return view('userlist');
    }
    public function userprofile(){
        return view('userprofile');
    }
}
