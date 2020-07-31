<?php
namespace App\Services;

use App\Repositories\Post\PostRepo;
use Exception;

class PostService{

    private $repo;

    public function __construct()
    {
        $this->repo = new PostRepo;
    }

    public function addPost($user_id,$data){
        try{
            $post = $this->repo->createPost($user_id,$data);
            return response()->json(['message'=>'new post successfully added','status'=>201,'post'=>$post],201);
        }catch(Exception $e){
            return response()->json(['message'=>'post not added','error'=>$e,'status'=>500],500);
        }
    }
}