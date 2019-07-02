<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function detail($slug){
        $post = Post::where('slug','=', $slug)->first();
        if(empty($post)){ abort(404); }
        else{
            $post->view += 1;
            $post->save();
            return view('frontend.pages.detail',[
                'post' => $post
            ]);
        }  
    }
    public function like($id){
        $post = Post::find($id);
        $post->like += 1;
        $post->save();
        return json_encode(['sucess', true]);
    }
    
    public function dislike($id){
        $post = Post::find($id);
        $post->dislike += 1;
        $post->save();
        return json_encode(['sucess', true]);
    }
}
