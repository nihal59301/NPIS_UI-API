<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function newUserValidation(){
        return view('new_user_validation');
    }
    public function login(Request $data){
        var_dump($data->toArray());
    }
}
