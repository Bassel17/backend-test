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

    public function addPost($id,Request $request){
        return $this->service->addPost($id,$request);
    }
}
