<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($id){
        $post = Post::find($id);
        return view('posts.index',compact('post'));
    }
}