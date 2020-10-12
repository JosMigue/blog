<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\CreateUpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Post;

class PostController extends Controller
{
  public function index()
  {
    $posts = Post::all();
    return view('posts.posts')->with('posts',$posts);
  }

  public function mypost()
  {
    $posts = Post::all();
    return view('posts.myposts')->with('posts',$posts);
  }

  public function create()
  {
    
  }

  public function store(CreatePostRequest $request)
  {
    $filenameWithExt = $request->file('image')->getClientOriginalName();
    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    $extension = $request->file('image')->getClientOriginalExtension();
    $fileNameToStore = $filename .'_'.time().'.'.$extension;
    $path = $request->file('image')->storeAs('public/cover_images',$fileNameToStore);
    Post::create(array_merge($request->validated(), ['image' => $fileNameToStore]) );
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
    if($request->hasFile('image')){
        $post->image = $fileNameToStore;
    }
    $post->save();
    return redirect('/posts');
  }

  public function destroy($id)
  {       
      $post = Post::find($id);
      Storage::delete('public/cover_images/'.$post->image);
      $post->delete();
      return redirect('/myposts');

  }
}
