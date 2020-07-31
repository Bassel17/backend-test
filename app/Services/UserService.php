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

    public function loginUser($credentials){
        try{
            if($token = auth()->attempt($credentials)){
                $user = $this->userRepo->getUserByEmail($credentials['email']);
                return $this->respondWithToken($token,$user->id);
            }
            return response()->json(['error' => 'Unauthorized','status'=>401],401);
        }catch(Exception $e){
            return response()->json(['error'=>'server error','status'=>500],500);
        }
    }

    public function logoutUser(){
        try{
            auth()->logout();
            return response()->json(['message' => 'Successfully logged out',"status"=>200],200);
        }catch(Exception $e){
            return response()->json(['error' => 'did not log out server error'],500);
        }
    }

    public function updateUser($id,$infoToUpdate){
        try{
            $user=$this->userRepo->getUser($id);
            $info=[
                'name'=> isset($infoToUpdate->name) ? $infoToUpdate->name : $user->name,
                'email'=>isset($infoToUpdate->email) ? $infoToUpdate->email : $user->email,
                'language_id'=>isset($infoToUpdate->language_id) ? $infoToUpdate->language_id : $user->language_id
            ];
            $this->userRepo->updateUser($id,$info);
            return response()->json(['message' => 'Successfully updated profile',"status"=>200],200);
        }catch(Exception $e){
            return response()->json(['error' => 'did not update'],500);
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