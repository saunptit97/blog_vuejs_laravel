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
        $most = Post::orderBy('view', 'DESC')->take(5)->get();
        
        View::share('categories', $categories);
        View::share('most', $most);

    }
}
