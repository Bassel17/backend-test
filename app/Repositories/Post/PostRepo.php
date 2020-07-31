<?php
namespace App\Repositories\Post;

use App\Post;
use App\User;

class PostRepo{

    private $model;
    private $userModel;

    public function __construct()
    {
        $this->model = new Post;
        $this->userModel = new User;
    }

    public function createPost($user_id,$data){
        return $this->model->create([
            'user_id'=>$user_id,
            'title'=>$data->title,
            'description'=>$data->description,
        ]);
    }

    public function getPosts($user_id){
        return $this->userModel->find($user_id)->posts;
    }

    public function getPost($id){
        return $this->model->find($id);
    }

    public function deletePost($id){
        return $this->model->find($id)->delete();
    }

    public function updatePost($id,$data){
        return $this->model->where('id',$id)->update($data);
    }
}