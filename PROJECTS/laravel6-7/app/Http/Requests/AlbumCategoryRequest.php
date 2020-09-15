<?php

namespace LaraCourse\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class AlbumCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'category_name' => 'required'
        ];
    }
    public  function  messages()
    {
      return  [
           'category_name.required' => 'Il campo Nome categoria è obbligatorio'
       ];
    }
}
