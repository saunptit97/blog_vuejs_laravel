<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
class CategoryController extends Controller
{
    public function index(){
        return view('backend.category.index');
    }
    public function slug($slug){
        $posts = Post::join('category', 'post.id_category','=','category.id')
        ->select('category.name', 'post.title', 'post.image','post.description','post.created_at','post.id')
        ->where('category.slug', $slug)->get();
        $category = Category::where('slug', $slug);
        return view('frontend.pages.category',[
            'posts' => $posts,
            'category' => $category
        ]);
    }
}
