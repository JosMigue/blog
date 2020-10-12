<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUpdatePostRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'title'  => 'required|max:255',
      'body' => 'required|max:255',
      'image' => 'image|nullable|max:1999| mimes:jpeg,jpg,png '
    ];
  }
}
