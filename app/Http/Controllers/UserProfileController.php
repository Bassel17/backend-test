<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->service = new UserService;
    }

    public function getUserProfile($id){
        return $this->service->getUser($id);
    }

    public function updateUserProfile($id,Request $request){
        return $this->service->updateUser($id,$request);
    }

    public function deleteUserProfile($id){
        return $this->service->deleteUser($id);
    }
}
