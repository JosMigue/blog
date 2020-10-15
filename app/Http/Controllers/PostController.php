<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\CreateUpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Post;
use App\Notifications\SendEmailUpdateEditors;

class PostController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
    $this->middleware('checkrole', ['only' => 'destroy']);
}

  public function index()
  {
    $posts = Post::all();
    return view('posts.index', compact('posts'));
  }

  public function mypost()
  {
    $posts = Post::all();

  //  $user = User::find(auth()->id());
    


    return view('posts.myposts', compact('posts'));
  }

  public function create()
  {
    return view('posts.create');
  }

  public function store(CreatePostRequest $request)
  {

   
    $filenameWithExt = $request->file('image')->getClientOriginalName();
    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    $extension = $request->file('image')->getClientOriginalExtension();
    $fileNameToStore = $filename .'_'.time().'.'.$extension;
    $path = $request->file('image')->storeAs('public/cover_images',$fileNameToStore);



    Post::create(array_merge($request->validated(), ['image' => $fileNameToStore, 'user_id' =>  auth()->user()->id ]) );
    return redirect('/posts');
  }

  public function show($id)
  {
    $post = Post::find($id);
    return view('posts.show', compact('post'));
  }

  public function edit($id)
  {
    $post = Post::find($id);
    return view('posts.edit')->with('post', $post);
  }

  public function update(CreateUpdatePostRequest $request)
  {

    if($request->hasFile('image')){
      $filenameWithExt = $request->file('image')->getClientOriginalName();
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      $extension = $request->file('image')->getClientOriginalExtension();
      $fileNameToStore = $filename .'_'.time().'.'.$extension;
      $path = $request->file('image')->storeAs('public/cover_images',$fileNameToStore);
    }
    $id = $request->input('id');
    $post = Post::find($id);
    $post->title = $request->input('title');
    $post->body = $request->input('body');
    $post->user_id = auth()->user()->id;
    if($request->hasFile('image')){
        $post->image = $fileNameToStore;
    }
    
    $post->save();

   
    $user = User::find(auth()->id());
    if($user->role == 2){
      $this->sendEmailNotificationUpdate($user);
    }

   

    return redirect()->route('posts.index');
  }

  public function destroy($id)
  {  
           
      $post = Post::find($id);
      Storage::delete('public/cover_images/'.$post->image);
      $post->delete();
      return redirect('/myposts');

  }

  private function sendEmailNotificationUpdate($user){

    
    
  
    $user->notify(new SendEmailUpdateEditors());

  }
}
