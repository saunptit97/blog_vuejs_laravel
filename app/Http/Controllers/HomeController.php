<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class HomeController extends Controller
{
    /**
     * Index
     */
    public function index(){
        $recents = Post::join('category', 'category.id', '=','post.id_category')
        ->select('post.id', 'post.title','post.created_at','category.name','post.image','post.slug' ,'category.slug as category_slug')
        ->orderBy('post.created_at', 'DESC')
        ->take(6)->get();

        $banner = Post::join('category', 'category.id', '=','post.id_category')
        ->select('post.id', 'post.title','post.created_at','category.name','post.image','post.slug' ,'category.slug as category_slug')
        ->where('feature', 1)
        ->orderBy('post.created_at', 'desc')->take(2)->get();
        
        return view('frontend.pages.home',[
            'recents' => $recents,
            'banner' => $banner
        ]);
    }
    /**
     * Page about
     */
    public function about(){
        return view('frontend.pages.about');
    }

    /**
     * Page contact
     */
    public function contact(){
        return view('frontend.pages.contact');
    }

    /**
     * Page most view
     */

    public function mostview(){
        $posts = Post::join('category', 'category.id' ,'=','post.id_category')
        ->select('category.name', 'post.title', 'post.image','post.description','post.created_at','post.id','post.slug','category.slug as category_slug')
        ->orderBy('view', 'DESC')->paginate(5);
        return view('frontend.pages.mostview',[
            'posts' => $posts
        ]);
    }
}
