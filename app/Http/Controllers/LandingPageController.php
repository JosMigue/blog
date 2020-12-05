<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class LandingPageController extends Controller
{
    public function index(){
        $posts = Post::with('user')->paginate(6);
        return view('blog.blog', compact('posts'));
    }
    
    public function show($post_name){
        $post_name = strtr($post_name, "-", " ");
        $post = Post::where('title', $post_name)->first();
        return view('blog.show', compact('post'));
    }

    public function showAUthor(User $user){
        return view('author.show', compact('user'));
    }
}
