<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class LandingPageController extends Controller
{
    public function index(){

    

        $posts = User::select('*')
                ->join('posts', 'users.id', '=', 'posts.user_id')
                ->get();
        
        
        return view('blog.blog', compact('posts'));
    }
}
