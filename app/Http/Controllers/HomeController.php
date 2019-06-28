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
        $recents = Post::orderBy('updated_at', 'DESC')->take(6)->get();

        return view('frontend.pages.home',[
            'recents' => $recents
        ]);
    }
}
