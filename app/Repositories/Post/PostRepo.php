<?php
namespace App\Repositories\Post;

use App\Post;

class PostRepo{

    private $model;

    public function __construct()
    {
        $this->model = new Post;
    }

    public function createPost($user_id,$data){
        return $this->model->create([
            'user_id'=>$user_id,
            'title'=>$data->title,
            'description'=>$data->description,
        ]);
    }
}