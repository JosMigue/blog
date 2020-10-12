<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'title'  => 'required|string|max:255',
      'body' => 'required|string|max:255',
      'image' => 'required|image|nullable|max:1999| mimes:jpeg,jpg,png'
    ];
  }
}
