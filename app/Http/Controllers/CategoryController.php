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
        ->select('category.name', 'post.title', 'post.image','post.description','post.created_at','post.id','post.slug' ,'category.slug as category_slug')
        ->where('category.slug', $slug)->paginate(2);
        $category = Category::where('slug', $slug)->first();
        if(empty($category)){ abort(404); }
        else{
            return view('frontend.pages.category',[
                'posts' => $posts,
                'category' => $category
            ]);
        }
    }
}
