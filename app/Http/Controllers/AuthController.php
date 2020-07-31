<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->service = new UserService;
    }

    public function register(Request $request){
        $userInfo = [
            'email'=>$request->email,
            'name'=>$request->name,
            'password'=>$request->password,
            'language_id'=>$request->language_id
        ];
        return $this->service->registerUser($userInfo);
    }
}
