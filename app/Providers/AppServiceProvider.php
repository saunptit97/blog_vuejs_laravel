<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Post;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

   
    /**
     * register
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        $categories = Category::all();
        $most = Post::join('category', 'category.id' ,'=','post.id_category')
        ->select('category.name', 'post.title', 'post.image','post.description','post.created_at','post.id','post.slug','category.slug as category_slug')
        ->orderBy('view', 'DESC')->inRandomOrder()->take(4)->get();
        $feature = Post::join('category', 'category.id' ,'=','post.id_category')
        ->select('category.name', 'post.title', 'post.image','post.description','post.created_at','post.id','post.slug','category.slug as category_slug')
        ->where('feature' , 1)->take(4)->get();
        $recents = Post::join('category', 'category.id', '=','post.id_category')
        ->select('post.id', 'post.title','post.created_at','category.name','post.image','post.slug' ,'category.slug as category_slug')
        ->orderBy('post.created_at', 'DESC')
        ->take(6)->get();

        View::share('categories', $categories);
        View::share('most', $most);
        View::share('feature', $feature);
        View::share('recents', $recents);
    }
}
