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

    public function getUserByEmail($email){
        $users = $this->model->where('email',$email)->get();
        return $users[0];
    }

    public function getUser($id){
        $user = $this->model->find($id);
        return $user;
    }

    public function updateUser($id,$info){
        return $this->model->where('id',$id)->update($info);
    }
}