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
    return view('posts.index');
  }

  public function mypost()
  {
    $posts = auth()->user()->posts()->get();
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
    Post::create(array_merge($request->validated(), ['image' => $fileNameToStore, 'user_id' => auth()->user()->id]));
    return redirect()->route('posts.index')->with('successMessage', __('Post added successfully'));
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

  public function update(CreateUpdatePostRequest $request, Post $post)
  {
    $fileNameToStore = $post->image;
    if($request->hasFile('image')){
      $filenameWithExt = $request->file('image')->getClientOriginalName();
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      $extension = $request->file('image')->getClientOriginalExtension();
      $fileNameToStore = $filename .'_'.time().'.'.$extension;
      $path = $request->file('image')->storeAs('public/cover_images',$fileNameToStore);
    }
    $dataArrayPost = $this->buildArrayPostOnUpdate($request, $fileNameToStore);
    $post->update($dataArrayPost);
    if(auth()->user()->role == 2){
      $creator = Post::find($request->id);
      $creator = User:: find($creator->user_id);
      $creator->setAttribute('ip', $request->ip());
      $creator->setAttribute('editorName', $user->name);
      $this->sendEmailNotificationUpdate($creator);
    }
    return redirect()->route('posts.index')->with('successMessage', __('Post updated sucessfully'));
  }

  private function buildArrayPostOnUpdate($request, $fileNameToStore){
    return $postDataToUpdate = [
      'title' => $request->validated()['title'],
      'body' => $request->validated()['body'],
      'image' => $fileNameToStore
    ];
  }

  public function destroy($id)
  {  
           
      $post = Post::find($id);
      Storage::delete('public/cover_images/'.$post->image);
      $post->delete();
      return redirect()->route('posts.index')->with('successMessage', __('Post has been deleted sucessfully'));

  }

  private function sendEmailNotificationUpdate($user){
  
    $user->notify(new SendEmailUpdateEditors());

  }
}

