<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function detail($id){
        $post = Post::find($id);
        $post->view += 1;
        $post->save();
        return view('frontend.pages.detail',[
            'post' => $post
        ]);
    }
}
