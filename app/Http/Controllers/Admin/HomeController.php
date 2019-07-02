<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Account;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Post;
use App\Category;
class HomeController extends Controller
{
    /**
     * admin view home
     */
    public function home(){
        if(Session::has('user')){
            $post = Post::count();
            // echo Post::count();
            $category = Category::count();
            $view = Post::sum('view');
            $like = Post::sum('like');
            $dislike = Post::sum('dislike');
            return view('backend.pages.home',[
                'post' => $post,
                'category' => $category,
                'view' => $view,
                'like' => $like,
                'dislike' => $dislike
            ]);
        }
        else return redirect()->route('login');
    }
    /**
     * login admin view
     */
    public function index(){
        if(Session::has('user')){
           return redirect()->route('admin');
        }
        return view('backend.pages.login');
    }
    /**
     * check login request
     */
    public function login(Request $request){
        $validator = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $email = $request->email;
        $password = $request->password;
        $account = Account::where('email', $email )->first();
        if(Hash::check($password, $account->password)){
            Session::put('user', $account);    
          
            return json_encode(['success'=>true]);
        }else{
            return json_encode(['success'=>false]);
        }
    }
    /**
     * logout
     */
    public function logout(){
        Session::forget('user');
        return redirect()->route('login');
    }
}
