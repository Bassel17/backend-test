<?php
namespace App\Repositories\User;

use App\User;

class UserRepo {

    private $model;

    public function __construct()
    {
        $this->model = new User;
    }

    public function registerUser($userInfo){
        $user = $this->model->create($userInfo);
        return $user;
    }

    public function getUser($email){
        $users = $this->model->where('email',$email)->get();
        return $users[0];
    }
}