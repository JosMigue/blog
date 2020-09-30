<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
Use App\Http\Requests\CreateUserRequest;
Use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }

  public function index()
  {
    $users = User::latest()->paginate(5);
    return view('user.index', compact('users'));
  }

  public function create()
  {
    return view('user.create');
  }

  public function store(CreateUserRequest $request)
  {
    if(User::create($request->validated())){
      return redirect()->route('users.index')->with('successMessage', __('User has been added succesfully'));
    }else{
      return redirect()->route('users.index')->with('erroMessage', __('Something went wrong, try again later'));
    }
  }

  public function show($id)
  {
    //
  }

  public function edit(User $user)
  {
    return view('user.edit', compact('user'));
  }

  public function update(UpdateUserRequest $request, User $user)
  {
    if($user->update($request->validated())){
      return redirect()->route('users.index')->with('successMessage', __('User has been updated succesfully'));
    }else{
      return redirect()->route('users.index')->with('erroMessage', __('Something went wrong, try again later'));
    }
  }

  public function destroy(User $user)
  {
    if($user->role != 1){
      if($user->delete()){
        return redirect()->route('users.index')->with('successMessage', __('User has been deleted succesfully'));
      }else{
        return redirect()->route('users.index')->with('erroMessage', __('Something went wrong, try again later'));
      }
    }else{
      return redirect()->route('users.index')->with('infoMessage', __('An admin can not be deleted'));
    }
  }
}
