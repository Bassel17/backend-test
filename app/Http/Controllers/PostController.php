<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostService;

class PostController extends Controller
{

    private $service;

    public function __construct()
    {
        $this->service = new PostService;
    }

    public function getPosts($id){
        return $this->service->getPosts($id);
    }

    public function getPost($id){
        return $this->service->getPost($id);
    }

    public function addPost($id,Request $request){
        return $this->service->addPost($id,$request);
    }

    public function deletePost($id){
        return $this->service->deletePost($id);
    }

    public function updatePost($id,Request $request){
        return $this->service->updatePost($id,$request);
    }
}
