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
        $user = $this->model->where('email',$email)->first();
        return $user;
    }

    public function getUser($id){
        $user = $this->model->find($id);
        return $user;
    }

    public function updateUser($id,$info){
        return $this->model->where('id',$id)->update($info);
    }

    public function deleteUser($id){
        $this->model->find($id)->delete();
    }
}