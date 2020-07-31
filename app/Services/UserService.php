<?php
namespace App\Services;

use App\Repositories\User\UserRepo;
use Exception;
use Illuminate\Support\Facades\Auth;

class UserService{
    private $userRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepo;
    }

    public function registerUser($userInfo){
        try{
            $user = $this->userRepo->registerUser($userInfo);
            $user_id = $user->id;
            $token = $user->password;
            return $this->respondWithToken($token,$user_id);
        }catch(Exception $e){
            return response()->json(['error'=>'user not registered','status'=>500],500);
        }
    }

    protected function respondWithToken($token,$id){

        return response()->json([
            'user_id' => $id,
            'access_token' => $token,
            'token_type' => 'bearer',
        ],200);

    }
}