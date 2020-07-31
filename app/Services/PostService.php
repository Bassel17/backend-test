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

    public function getPosts($user_id){
        try{
            $posts = $this->repo->getPosts($user_id);
            return response()->json(['status'=>200,'posts'=>$posts],200);
        }catch(Exception $e){
            return response()->json(['message'=>'can not get posts','error'=>$e,'status'=>500],500);
        }
    }

    public function getPost($id){
        try{
            $post = $this->repo->getPost($id);
            return response()->json(['status'=>200,'post'=>$post],200);
        }catch(Exception $e){
            return response()->json(['message'=>'can not get post','error'=>$e,'status'=>500],500);
        }
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